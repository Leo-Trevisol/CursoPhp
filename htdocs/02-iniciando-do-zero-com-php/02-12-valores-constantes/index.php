<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.12 - Constantes e constantes mágicas");

/*
 * [ constantes ] https://php.net/manual/pt_BR/language.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

define('UD', 'Back-end com PHP');
const TESTE = 'ERROR';
const TEACHER = "Jhonas Leonardo";

$formation = true;

if($formation){
    define("COURSE_TYPE", "Formação");

}else{
    define("COURSE_TYPE", 'Curso Livre');
}

namespace Source;

class config{
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
}

echo "<h1>", Config::HOST, "</h1>";
echo "<h1>", Config::USER, "</h1>";

var_dump(get_defined_constants(true)['user']);






/*
 * [ constantes mágicas ] https://php.net/manual/pt_BR/language.constants.predefined.php
 */
fullStackPHPClassSession("constantes mágicas", __LINE__);
