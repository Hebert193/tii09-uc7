<ul>

<?php
$frutas = ["Goiaba", "Uva", "Laranja"];//trouxe do banco de dados
foreach($frutas as $fruta) {
    echo "<li> $fruta </li>";
}
?>
</ul>

<!-- Array Associativo-->
 <table border = "1">

<?php
$clientes = [
    "nome" => "Carlos",
    "idade" => "33",
    "email" => "carlos@mail.com"
];

foreach($cliente as $cli) {
    echo "<tr><td>$cli</td></tr>";
}
?>

</table>

<!--Array Multidimensional (Matriz)-->
<table border="1">
    <tr>
        <th>Produto</th>
        <th>Preco</th>
    </tr>
    <?php
    $produtos = [
            ["nome" => "Pão", "preco" => 1.50],
            ["nome" => "Café", "preco" => 3.00],
            ["nome" => "Leite", "preco" => 4.80]
        ];
    
    foreach($produtos as $produto) {
        echo "
            <tr>
                <td>{$produto['nome']}</td>
                <td>{$produto['preco']}</td>
            </tr>
        ";
    }

    ?>
</table>


