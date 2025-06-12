<?php
session_start();

$islogged = isset($_SESSION['token']);

?>

<h1>Home</h1>

<nav>
    <a href="index.php">Home</a>
    <?php if ($islogged):?>
        <a href="usuario.php">minha conta</a>
        <a href="cadastro.php">sair</a>
    <?php else: ?>
        <a href="index.php">Login</a>
        <a href="cadastro.php">Cadastrar</a>
    <?php endif; ?>
</nav>
<p>Bem-vindo ao sistema!</p>