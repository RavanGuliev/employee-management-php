<?php
require_once 'config/database.php';
require_once 'app/Controllers/EmployeeController.php';

$ctrl = new EmployeeController($pdo);
$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

$search = $_GET['search'] ?? '';
$page = (int)($_GET['page'] ?? 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($action == 'add') {
        $ctrl->save($_POST);
    } elseif ($action == 'edit') {
        $ctrl->save($_POST, $id);
    }
    header("Location: index.php");
    exit;
}

if ($action == 'delete') {
    $ctrl->remove($id);
    header("Location: index.php");
    exit;
}

$result = $ctrl->list($search, $page);
$employees = $result['data']; 
$total_pages = $result['total_pages'];
$current_page = $result['current_page'];

include 'views/employees/list.php';