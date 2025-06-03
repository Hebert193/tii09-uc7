<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../dao/ClienteDAO.php';

$dao = new ClienteDAO();
$action = $_GET['action'] ?? null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'listar': // GET
        echo json_encode($dao->getAll());
        break;

    case 'buscar': // GET
        if ($id) {
            $cliente = $dao->getById($id);
            if ($cliente)
                echo json_encode($cliente);
            else {
                http_response_code(404);
                echo json_encode(["error" => "Cliente não encontrado!"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Você não informou o ID"]);
        }
        break;

    case 'cadastrar': // POST
        echo json_encode("Chamou o cadastrar");
        break;

    case 'atualizar': // PUT
        echo json_encode("Chamou o atualizar");
        break;

    case 'excluir': // DELETE
        if ($id) 
        {
            echo json_encode("Chamou o excluir");
        }
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'Ação inválida, informar action']);
        break;
}
