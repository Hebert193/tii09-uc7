<?php

## Repetição

for($i = 1; $i < 5; $i++){
    echo "Funciona $i! <br>";
}

//While
$contador = 1;
while ($contador < 5) {
    echo "contando: $contador <br>";
    $contador++;
}

//arrauy
$nomes = ["Adenilsa", "carlos", "gustavo"];
/*
for($i = 0; $i < count($nomes); $i++){
    echo "Ola, $nomes[$i] ! <br>"; 
}
*/
foreach($nomes as $n) {
    echo "ola, $n! <br>";
}