<?php
require_once __DIR__ . '/../Models/Employee.php';

class EmployeeController {
    private $model;

    public function __construct($pdo) {
        $this->model = new Employee($pdo);
    }

    public function list($search = '', $page = 1) {
        $limit = 10;
        $offset = ($page - 1) * $limit;
        return [
            'data' => $this->model->all($search, $limit, $offset),
            'total_pages' => ceil($this->model->count($search) / $limit),
            'current_page' => $page
        ];
    }

    public function save($data, $id = null) {
        if (empty($data['first_name']) || empty($data['email']) || !is_numeric($data['salary'])) {
            return false;
        }
        if (!$this->model->isEmailUnique($data['email'], $id)) {
            return false;
        }

        return $id ? $this->model->update($id, $data) : $this->model->store($data);
    }

    public function remove($id) {
        return $this->model->softDelete($id);
    }
}