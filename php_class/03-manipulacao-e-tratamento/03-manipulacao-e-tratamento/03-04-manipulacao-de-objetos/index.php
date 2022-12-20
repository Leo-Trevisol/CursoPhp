<?php

require __DIR__ . '/../../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

$arrProfile = [
    "profile" => [
        "name" => "leozin",
        "lastname" => "tretre"
    ],
    "company" => "leozincompany",
    "mail" => "leozin@gmail"
];

$objProfile = (object)$arrProfile;

var_dump($arrProfile, $objProfile);

$objProfile->profile = (object) $arrProfile['profile'];

echo "<p> {$objProfile->profile->name} trabalha na {$objProfile->company}</p>";

$ceo = $objProfile;
unset($ceo->company);
var_dump($ceo, $objProfile);

$company = new stdClass();

$company->company = "Agencia leozin";
$company->ceo = $ceo;
$company->manager = new stdClass();
$company->manager->name = 'Gustavo';
$company->manager->email = 'gus@gmail.com';

var_dump($company);

echo "<p> O ceo da {$company->company} é o tal do {$company->manager->name}, mande o email para {$company->manager->email}.</p>";

echo " {$company->mail}";




/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);


/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

$date = new DateTime();

var_dump([
    "class" => get_class($company),
    "methods" => get_class_methods($company),
    "vars" => get_object_vars($company),
    "parent" => get_parent_class($company),
    "subclass" => is_subclass_of($company, "stdClass")
]);

var_dump([
    'class' => get_class($date),
    'methods' => get_class_methods($date),
    'vars' => get_object_vars($date),
    'parent' => get_parent_class($date),
    'subclass' => is_subclass_of($date, "date")
]);

$exception = new PDOException();
var_dump([
    'class' => get_class($exception),
    'methods' => get_class_methods($exception),
    'vars' => get_object_vars($exception),
    'parent' => get_parent_class($exception),
    'subclass' => is_subclass_of($exception, "Exception")
]);
