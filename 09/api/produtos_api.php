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

        case 'cadastrar': // POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && $inputBody) {
                $prd = new Produto($inputBody['id'], $inputBody['nome'], $inputBody['preco'], $inputBody['dataDeCadastro'], $inputBody['dataDeValidade'], $inputBody['ativo']);
                if($dao->create($prd))
                {
                    http_response_code(201);
                    echo json_encode(['message' => 'Produto cadastrado com sucesso']);
                }
                else
                {
                    http_response_code(500);
                    echo json_encode(['error' => 'Produto não cadastrado!']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Dados inválidos ou método incorreto']);
            }
            break;
    
        case 'atualizar': // PUT
            if ($_SERVER['REQUEST_METHOD'] === 'PUT' && $id && $inputBody) {
                $prd = new Produto($id, $inputBody['nome'], $inputBody['cpf'], $inputBody['dataDeNascimento'], $inputBody['ativo']);
                if ($dao->update($prd)) 
                {
                    http_response_code(201);
                    echo json_encode(['message' => 'Produto atualizado com sucesso']);
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Erro ao atualizar Produto!']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Dados inválidos ou método incorreto']);
            }
            break;
            
    
        case 'excluir': // DELETE
            if ($id && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
                if ($dao->delete($id)) {
                    echo json_encode(['message' => 'Produto excluído!']);
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Erro ao excluir!']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID não fornecido ou método incorreto']);
            }
            break;
    
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Ação inválida, informar action']);
            break;
    }
    