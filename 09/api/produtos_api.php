<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

require_once __DIR__ . '/../dao/ProdutoDAO.php';

$doa = new ProdutoDAO();
$action = $_GET['action'] ?? null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$inputBody = json_decode(file_get_contents('php://input'), true);

switch ($action){
    case   'listar' :
        echo json_encode($dao->getAll());
        break;
    
    case 'buscar':
        if ($id) {
            $produto = $dao->getById($id);
            if ($produto)
                echo json_encode($produto);
            else {
                http_response_code(404);
                echo json_encode(["error" => "Produto não encontrado!"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Você não informou o ID"]);
        }
        break;

    case 'cadastrar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $inputBody){
            
        }    
}