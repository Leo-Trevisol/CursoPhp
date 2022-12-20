<?php

require __DIR__ . '/../../../fullstackphp/fsphp.php';
fullStackPHPClassSession("manipulação", __LINE__);
$index = [
    "AC/DC",
    "Nirvana",
    "Pearl Jam"
];
var_dump($index);
$assoc = [
    "band1" => "AC/DC",
    "band2" => "Pearl Jam",
    "band3" => "Nirvana"
];
var_dump($assoc);
/// adiciona posições no inicio da array
array_unshift($index, "", "Pink Floyd");


$assoc = ["band4" => " ", "band5" => "Pink Floyd"] + $assoc;


// adiciona posições no final da array
array_push($index, "Black Sabbath");
var_dump($index);
$assoc = $assoc + ["band6" => " "];
var_dump($assoc);

// Remove primeira posição:
array_shift($index);
array_shift($assoc);
var_dump($index);
var_dump($assoc);
//Remove ultima posição
array_pop($index);
array_pop($assoc);
var_dump($index);
var_dump($assoc);

array_unshift($index, "", "");
$assoc = $assoc + ["band6" => false, "band7" => ''];


var_dump($index);
var_dump($assoc);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

// Retorna array em ordem reversa
$index = array_reverse($index);
$assoc = array_reverse($assoc);
var_dump($index);
var_dump($assoc);

//Ordena pelo VALUE em ordem alfabética
asort($index);
asort($assoc);
var_dump($index);
var_dump($assoc);
//Ordena em ordem alfabética e recria o índice
sort($index);
asort($index);
var_dump($index);
var_dump($assoc);

//Ordena em order alfabética inversa e recria o índice
rsort($index);
var_dump($index);
var_dump($assoc);


/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump(
    [
        array_keys($assoc),
        array_values($assoc)
    ]
);

if (in_array("Nirvana", $assoc)) {
    echo "<p> Nirvana</p>";
} else {
    echo "Não encontrado";
};

$assoc = $assoc + ["band6" => null];
var_dump($assoc);

if (array_search("", $assoc)) {
    echo array_search("", $assoc);
};

$arrToString = implode(", ", $assoc);
echo "<p class='text_red'>Eu curto {$arrToString} e algumas outras bandas dessa época!</p>";
echo $arrToString;



/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name" => "leozin",
    "company" => "leozinAgengy",
    "email" => "leozin@gmail.com"
];

$template = <<<TPL

<article>
<h1> {{name}}</h1>
<p> {{company}}</p>
<span class="tag">
<a href="mailto:{{email}}?subject=Enviando e-mail pelo template" title="enviar email para {{name}}"> Enviar Email!</a>
</span>
</article>
TPL;

echo $template;

$viewProfile = "{{" . implode("}}&{{", array_keys($profile)) . "}}";

echo "<p> {$viewProfile} </p>";

var_dump(explode("&", $viewProfile));

echo str_replace(explode('&', $viewProfile), array_values($profile), $template);
