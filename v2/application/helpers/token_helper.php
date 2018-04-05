<?php

function create_token($iterator = 6) {
    $string = "";
    $chaine = "a0b1c2d3e4f5g6h7i8j9klmnpqrstuvwxy123456789";
    srand((double)microtime()*1000000);
    for($i = 0; $i < $iterator; $i++){
        $string .= $chaine[rand()%strlen($chaine)];
    }
    return $string;
}
