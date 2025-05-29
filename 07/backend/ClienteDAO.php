<?php

require_once 'Cliente.php';
require_once 'Database.php';

class ClienteDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): array
    {
        $resultadoDoBanco = $this->db->query("SELECT * FROM clientes");
        $cliente = [];

        while($row = $resultadoDoBanco->fetch(PDO::FETCH_ASSOC)) {
            $cliente[] =  new Cliente(
                $row['id'],
                $row['nome'],
                $row['cpf'],
                $row['ativo'],
                $row['DataDeNascimento']
            );
        }

        return $cliente;
    }

    public function getById(int $id): ?Cliente
    {
        $sql = "SELECT * FROM clientes WHERE id = :id";

        $stmt = $this->db->prepare($sql);        
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row? new Cliente(
            $row['id'],
            $row['nome'],
            $row['cpf'],
            $row['ativo'],
            $row['DataDeNascimento']
        ) : null;
    }

    public function create(Cliente $cliente): void 
    {
        $sql = "INSERT INTO clientes (nome, cpf, ativo, DataDeNascimento) VALUES
                (:nome, :cpf, :ativo, :Nascimento)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nome' => $cliente->getNome(),            
            ':cpf' => $cliente->getcpf(),            
            ':ativo' => $cliente->getAtivo(),            
            ':Nascimento' => $cliente->getDataDeNascimento(),          
        ]);
    }

    public function createInseguro(Cliente $cliente): void
    {
        $sql = "INSERT INTO clientes (nome, cpf, ativo, DataDeNascimento) VALUES
            ({$cliente->getNome()}, 
            {$cliente->getcpf()}, 
            {$cliente->getAtivo()},
            '{$cliente->getDataDeNascimento()}')";

        $this->db->query($sql);
    }

    public function update(Cliente $cliente): void
    {
        $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, ativo = :ativo, DataDeNascimento = :Nascimento";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id' => $cliente->getId(),
            ':nome' => $cliente->getNome(),            
            ':cpf' => $cliente->getcpf(),            
            ':ativo' => $cliente->getAtivo(),            
            ':Nascimento' => $cliente->getDataDeNascimento(),            
        ]);
    }    

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

/*
// SQL INJECTION:
$dao = new clienteDAO();
$cliente = new Cliente(null, "'Teste2', 0, 0, '2025-10-10', '2025-12-12'); DROP TABLE clientes --", 9.99, 1, '2025-01-01', '2025-12-12');

$dao->createInseguro($cliente);
*/

