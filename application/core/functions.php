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

function randomHash($data)
{
    $factory = new RandomLib\Factory;
    $generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM));

    return $generator->generateString($data);
}

function hashCheck($algo, $hashedStr, $str)
{
    return$hashedStr === hash($algo, $str) ? true : false;
}

function getCorrectMoneyFormat($number){
    setlocale(LC_MONETARY, 'en_DK');
    return money_format("%.2n", $number);
}