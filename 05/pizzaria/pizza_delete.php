<?php

require_once 'PizzaDAO.php';

if(!isset($_GET['id']))
{
    echo "ID da Pizza não fornecido!";
    exit();
}

$dao = new ContatoDAO();
$pizza = $dao->getById($_GET['id']);

if(!$pizza)
{
    echo "Contato não encontrado no Sistema!";
    exit();
}

$dao->delete($pizza->getId());

header("Location: index.php");
exit();

?>