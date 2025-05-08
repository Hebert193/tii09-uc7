<?php
$clientes = [
    [
    "nome"=> "Fulano",
    "cpf"=> "154687164-15",
    "cidade"=> "SP"],

    [
    "nome"=> "Fabio",
    "cpf"=> "154687164-10",
    "cidade"=> "RJ"]
];

foreach ($clientes as $cli){
    echo "
    <tr><td>{$cli['nome']}</td></tr>
    <tr><td>{$cli['cpf']}</td></tr>
    <tr><td>{$cli['cidade']}</td></tr>
    ";
}