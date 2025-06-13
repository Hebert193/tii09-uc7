<?php
require_once '../backend/Database.php';
require_once '../backend/Produto.php';

class ProdutoDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): array
    {
        $resultadoDoBanco = $this->db->query("SELECT * FROM produtos");
        $produtos = [];

    }
}