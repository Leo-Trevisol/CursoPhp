<?php


require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.03 - Comandos de saída");

/**
 * [ echo ] https://php.net/manual/pt_BR/function.echo.php
 */
fullStackPHPClassSession("echo", __LINE__);
    $hello = "ola mundo";
    $firstprogram = "esse é meu primeiro output";
    echo "<p> ola mundo!" . "esse é meu primeiro output</p>";
    echo '<h1>'. $hello . "" . $firstprogram . "</h1>";
    echo '<h1>', $hello . "" , $firstprogram . "</h1>";


    $array = [
        'person'[
        'name' => 'Leo',
        'lastname' => 'Trevisol',
        'age' => 19,
        'time' => 'Imperial'
        ]
    ];

    echo "<p> O seu nome eh {$array['person']['name']} . {$array['person']['lastname']} </p>";

    echo "Olá Mundo!";


/**
 * [ print ] https://php.net/manual/pt_BR/function.print.php
 */
fullStackPHPClassSession("print", __LINE__);

print "helllo worlddd";


/**
 * [ print_r ] https://php.net/manual/pt_BR/function.print-r.php
 */
fullStackPHPClassSession("print_r", __LINE__);

print"<pre>";
print_r($array);



/**
 * [ printf ] https://php.net/manual/pt_BR/function.printf.php
 */
fullStackPHPClassSession("printf", __LINE__);

printf("<p> o seu nome é %s e seu sobrenome é %s </p> <br> 
<p> ele tem %s e torce para o <b class='tag> %s</b> </p> . ", $array['name'], $array['lastname']
, $array['age'], $array['time']
);


/**
 * [ vprintf ] https://php.net/manual/pt_BR/function.vprintf.php
 */
fullStackPHPClassSession("vprintf", __LINE__);

vprintf("<p> O seu nome é ");


/**
 * [ var_dump ] https://php.net/manual/pt_BR/function.var-dump.php
 */
fullStackPHPClassSession("var_dump", __LINE__); //VAR_DUMP DEBUGA O CODIGO

var_dump($array);
