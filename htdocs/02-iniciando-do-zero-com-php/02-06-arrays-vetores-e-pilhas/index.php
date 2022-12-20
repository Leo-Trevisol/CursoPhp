<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.06 - Arrays, vetores e pilhas");

/**
 * [ arrays ] https://php.net/manual/pt_BR/language.types.array.php
 */
fullStackPHPClassSession("index array", __LINE__);

$arrayIndex = [
    "leo",
    "gus",
    "felps"
];

$arrayIndex[] = 'Cliff';
$arrayIndex[] = 'Phil';

echo "<pre>";
var_dump($arrayIndex);


/**
 * [ associative array ] "key" => "value"
 */
fullStackPHPClassSession("associative array", __LINE__);

$arrayAssociative = [
    "vocal" => "Bryan",
    "solo_guitar" => "Angus",
    "base_guitar" => "leo",
    "bass_guitar" => "phil"
];

$arrayAssociative['drums'] = "Malcon";

// foreach($arrayAssociative as $key => $value){

// };

echo "<pre>";
var_dump($arrayAssociative);

// $brian => ["Brian", "Mic"];

// $angus => ["Angus", "Solo"];




/**
 * [ multidimensional array ] "key" => ["key" => "value"]
 */
fullStackPHPClassSession("multidimensional array", __LINE__);


/**
 * [ array access ] foreach(array as item) || foreach(array as key => value)
 */
fullStackPHPClassSession("array access", __LINE__);

