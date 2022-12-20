<?php

setlocale(LC_ALL, "pt-br", "pt_BR.utf-8", "pt-BR", "portuguese");
require __DIR__ . '/../../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.05 - Manipulação de datas");

/*
 * [ a função date ] setup | output
 * [ date ] https://php.net/manual/pt_BR/function.date.php
 * [ timezones ] https://php.net/manual/pt_BR/timezones.php
 */
fullStackPHPClassSession("a função date", __LINE__);

var_dump([
    date_default_timezone_get(),
    date(DATE_W3C),
    date("d/m/Y H:i:s")
]);

define("DATE_BR", "d/m/Y H:i:s");
define("DATE_TIMEZONE", "America/Sao_Paulo");

date_default_timezone_set(DATE_TIMEZONE);

var_dump([
    date_default_timezone_get(), date(DATE_BR)
]);

var_dump(getdate());

$getdate = (object) getdate();

echo "Hoje é dia " . getdate()['mday'] . " de {$getdate->month} de {$getdate->year}.</p>";



/**
 * [ string to date ] strtotime | strftime
 */
fullStackPHPClassSession("string to date", __LINE__);

var_dump([
    "strtotime NOW" => strtotime("now"),
    "time" => time(),
    "date-time" => date(
        DATE_BR,
        time()
    ),
    "strtotime+10d" => date(DATE_BR, strtotime("+10days")),
    "strotime-10d" => date(DATE_BR, strtotime("-10days")),
    "strtotime+1" => date(DATE_BR, strtotime("+1months")),
    "strtorime+1y" => date(DATE_BR, strtotime("+1years")),
]);

$format = '%d/%B/%Y %Hh%Mmin';

echo "<p> A data de hoje é " . strftime($format) . "</p>";

echo strftime("Hoje é dia %d de %B de %Y ás %H horas e %M minutos", strtotime("today"));
