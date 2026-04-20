<?php
class Employee {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function all($search = '', $limit = 10, $offset = 0) {
        $sql = "SELECT * FROM employees WHERE deleted_at IS NULL";
        $params = [];
        if (!empty($search)) {
            $sql .= " AND (first_name LIKE ? OR last_name LIKE ? OR email LIKE ?)";
            $st = "%$search%";
            $params = [$st, $st, $st];
        }
        $sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function count($search = '') {
        $sql = "SELECT COUNT(id) FROM employees WHERE deleted_at IS NULL";
        $params = [];
        if (!empty($search)) {
            $sql .= " AND (first_name LIKE ? OR last_name LIKE ? OR email LIKE ?)";
            $st = "%$search%";
            $params = [$st, $st, $st];
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }

    public function isEmailUnique($email, $id = null) {
        $sql = "SELECT id FROM employees WHERE email = ? AND deleted_at IS NULL";
        if ($id) $sql .= " AND id != " . (int)$id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount() === 0;
    }

    public function store($data) {
        $sql = "INSERT INTO employees (first_name, last_name, email, phone, position, salary) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->prepare($sql)->execute([
            $data['first_name'], $data['last_name'], $data['email'], 
            $data['phone'], $data['position'], $data['salary']
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE employees SET first_name=?, last_name=?, email=?, phone=?, position=?, salary=? WHERE id=?";
        return $this->db->prepare($sql)->execute([
            $data['first_name'], $data['last_name'], $data['email'], 
            $data['phone'], $data['position'], $data['salary'], $id
        ]);
    }

    public function softDelete($id) {
        return $this->db->prepare("UPDATE employees SET deleted_at = NOW() WHERE id = ?")->execute([$id]);
    }
}