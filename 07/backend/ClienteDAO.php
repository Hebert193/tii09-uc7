<?php

require_once 'Cliente.php';
require_once 'Database.php';

class ProdutoDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): array
    {
        $resultadoDoBanco = $this->db->query("SELECT * FROM cliente");
        $cliente = [];

        while($row = $resultadoDoBanco->fetch(PDO::FETCH_ASSOC)) {
            $cliente[] =  new Cliente(
                $row['id'],
                $row['nome'],
                $row['cpf'],
                $row['ativo'],
                $row['dataNacimento']
            );
        }

        return $cliente;
    }

    public function getById(int $id): ?Cliente
    {
        $sql = "SELECT * FROM cliente WHERE id = :id";

        $stmt = $this->db->prepare($sql);        
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row? new Cliente(
            $row['id'],
            $row['nome'],
            $row['preco'],
            $row['ativo'],
            $row['dataDeCadastro'],
            $row['dataDeValidade']
        ) : null;
    }