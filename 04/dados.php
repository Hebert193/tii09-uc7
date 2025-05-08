<?php

$produtos = [
    ["nome" => "Pão", "preco" => 1.50],
    ["nome" => "Café", "preco" => 3.00],
    ["nome" => "Leite", "preco" => 4.80]
];

function calcularTotalprodutos(array $itens): float {
    $total = 0;

    foreach($itens as $item){
        $total += $item['preco'];
    }
    return $total;
}

echo "total: R$ " . number_format(calcularTotalprodutos($produtos), 2, ',','.');

function produtoMaisBarato(array $itens): array {
    $maisBarato = $itens[0];
    
    foreach($itens as $item) {
        if($item['preco'] < $maisBarato['preco']) {
            $maisBarato = $item;
        }
    }

    return $maisBarato;
}

$resultado = produtoMaisBarato($produtos);
echo "O item mais barato da lista é {$resulta['nome']} no preco de {$resultado['preco']}";