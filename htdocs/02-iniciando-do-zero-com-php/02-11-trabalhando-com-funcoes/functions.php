<?php

function functionName($arg1, $arg2, $arg3, $arg4, $arg5, $arg6)
{
    $body = [$arg1, $arg2, $arg3, $arg4, $arg5, $arg6];
    return $body;
}
function optionArg($arg1, $arg2 = 'Default', $arg3 = null)
{
    $body = [$arg1, $arg2, $arg3];

    return $body;
}

function leozin()
{
}


function calcImc()
{
    global $weight;
    global $height;

    return ($weight / ($height * $height));
}

functionName(2, 3, 3, 3, 3, 3);


function payTotal($price)
{
    static $total;
    $total += $price;
    return "<p> O total a pagar é <span class='tag'>  $total";
}

function myClass()
{
    $studentNames = func_get_args();
    $studentCount = func_num_args();
    return ['alunos' => $studentNames, 'presentes' => $studentCount];
}
