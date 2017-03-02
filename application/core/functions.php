<?php

/**
 *  Dump & die
 *  Funktionen udskriver en formateret variabel, og bruges blandt andet til at se hvad indholdet af et array er. Efter
 *  udskrift dør scriptet, så der ikke udskries yderligere.
 *
 *  Modtager:   $data
 *  Returnere:  var_dump $data
 **/
function dd($data)
{
    echo "<pre>";

    die(var_dump($data));

    echo "</pre>";
}