<?php

require_once 'ContatoDAO.php';
$dao = new ContatoDAO();
$contatos = $dao->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>
<body>
    <h2>Lista de Contatos</h2>

    <a href="contato_form.php">Cadastrar Contato</a><br>
    
    <table border="1" cellpadding="5">
        <tr>
            <!-- <th>ID</th> -->
            <th>Nome</th>
            <th>Telefone</th>
            <!-- <th>Email</th>
            <th>Endereco</th> -->
            <th>Ações</th>
        </tr>
        <?php foreach ($contatos as $c): ?>
            <tr>
                <!-- <td><?= $c->getId() ?></td> -->
                <td><?= $c->getNome() ?></td>
                <td><?= $c->getTelefone() ?></td>
                <!-- <td><?= $c->getEmail() ?></td>
                <td><?= $c->getEndereco() ?></td> -->
                <td>
                    <a href="contato_details.php?id=<?=$c->getId() ?>">Detalhes</a>
                    <a href="#">Editar</a>
                    <a href="#">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>