<?php
//chama o banco de dados
class Database
{
    public static function getInstance()
    {
        return new PDO("mysql:host=localhost;dbname=venda", "root", "");
    }
}

print_r(Database::getInstance()->query("select * from produtos"));
?>