<?php

$salario = (float) $_GET['salario'];

$desconto = $salario * 0.11;
$salarioLiquido = $salario - $desconto;

echo "Salario: $salario, Desconto: $desconto, Salario Líquido: $salarioLiquido";