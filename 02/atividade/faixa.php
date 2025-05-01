<?php
$idade = (int) $_GET["idade"];

if ($idade <=12){
    echo "criança";
}elseif($idade <=18){
    echo "adolecente";
}elseif($idade <= 60){
    echo "adulto";
}else {
    echo "idoso";}