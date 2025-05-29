<?php
require_once '../backend/ClienteDAO.php';
$dao = new ClienteDAO();

if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit;
}

$cliente = $dao->getById($_GET['id']);

if (!$cliente) {
    echo "Produto não encontrado.";
    echo "<a href='../index.php'>Voltar</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <h2>Detalhes do Cliente</h2>
    <ul>
        <li><strong>ID: </strong><?= $cliente->getId() ?></li>
        <li><strong>Nome: </strong><?= $cliente->getNome() ?></li>
        <li><strong>CPF: </strong><?= $cliente->getcpf() ?></li>
        <li><strong>Ativo: </strong><?= $cliente->getAtivo() ? 'Sim' : 'Não' ?></li>
        <li><strong>Data de Nascimento: </strong><?= $cliente->getDataDeNascimento() ?></li>
    </ul>
</body>

</html>