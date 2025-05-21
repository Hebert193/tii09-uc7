<?php
require 'Pizza.php';
require 'Conexao.php';

class PizzaDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getBd();
    }

    public function getAll()
    {        
        $stmt = $this->db->query("SELECT * FROM pizza");
        $pizzas = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pizzas[] = new Pizza(
                $row['id'],
                $row['sabor'],
                $row['tamanho'],
                $row['preco']
            );
        }
        return $pizzas;
    }

    public function getById(int $id): ?Pizza {
        $stmt = $this->db->prepare("SELECT * FROM pizza WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $row ? new Pizza($row['id'], $row['sabor'], $row['tamanho'], $row['preco']) : null;
    }

    public function create(Pizza $pizza) {
        $sql = "INSERT INTO pizza (sabor, tamanho, preco)
            VALUES (:sabor, :tamanho, :preco)";
            $stmt = $this->db->prepare($sql);

        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();

        $stmt->bindParam(':sabor', $sabor);
        $stmt->bindParam(':tamanho', $tamanho );
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();
    }

    public function update(Pizza $pizza)
{
    $sql = "UPDATE pizza SET sabor = :sabor, tamanho = :tamanho, preco = :preco 
            WHERE id = :id";

    $stmt = $this->db->prepare($sql);

    $id = $pizza->getId();
    $sabor = $pizza->getSabor();
    $tamanho = $pizza->getTamanho();
    $preco = $pizza->getPreco();

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':sabor', $sabor);
    $stmt->bindParam(':tamanho', $tamanho);
    $stmt->bindParam(':preco', $preco);

    $stmt->execute();
}

public function delete(int $id): void {
    $stmt = $this->db->prepare("DELETE FROM pizza WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
}
?>