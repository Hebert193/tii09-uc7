<?php

function saudacao(): void{
    echo "Bem vindo ao sistema! <br>";
}

saudacao();

function somar($a, $b) {
    return $a + $b;
}

echo "Retorno da soma: " . somar(10, 8) . "<br>";

function subtrair(int $a, int $b){
    return $a - $b;
}

echo "retorno da subtração:" . subtrair(10, 8). "<br>";

function multiplicar(int $a, int $b): int{
    return $a * $b;
}

echo "Retorno da multiplicação:" . multiplicar(10, 8) . "<br>";

function dividir(int $a, int $b): float | string{
    if( $b == 0) {
        return "impossivel dividir por zero!";
    }
    return $a / $b;
}

echo "Retorno da divisão:" . dividir(10, 8) . "<br>";

function listarNomes(array $nomes):void{
    foreach($nomes as $n){
        echo "<li>$n</li>";
    }
}

$professores = ["Celso", "Luana","Arlindo"];
echo "<ul>";
listarNomes($professores);
echo "</ul>";

