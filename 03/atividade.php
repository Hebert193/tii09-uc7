<?php
/*
Crie um array com 4 nomes de alunos e exiba-os em uma lista <ul>
no navegador
*/

$alunos = ["Fulano", "Fabio", "Flavio", "Fernado"];

foreach ($alunos as $aluno){
echo "<tr><td>$aluno</td></tr>";
}