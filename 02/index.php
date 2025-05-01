<?php

$a = 10;
$b = 5;

echo "Soma: " . ($a + $b) . "<br>";
echo "$a Maior que $b ?" . ($a > $b ? "Sim" : "Não") . "<br>";

$idade = 57;

if($idade >= 18) {
    echo "Maior de idade, $idade anos!<br>";
} else {
    echo "Menor de idade, $idade anos!<br>";
}

// SWITCH CASE
$dia = "quinta";

switch($dia) {
    case "segunda":
        echo "Inicio da semana";
        break;
    case "sexta":
        echo "Último dia útil";
        break;
    default:
        echo "Dia comum";
}