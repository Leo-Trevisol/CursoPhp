<?php

setlocale(LC_ALL, "pt-br", "pt_BR.utf-8", "pt-BR", "portuguese");
require __DIR__ . '/../../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime", __LINE__);


define('DATE_BR', 'd/m/Y H:i:s');

$dateNow = new DateTime();
$dateBirthday = new DateTime("1982-06-12");
$dateStatic = DateTime::createFromFormat(DATE_BR, '08/10/2022 19:00:00');

var_dump($dateNow, $dateBirthday, $dateStatic);

var_dump(
    $dateNow->format(DATE_BR),
    $dateNow->format('d')
);

echo "Hoje é dia {$dateNow->format('d')} do {$dateNow->format('F')} de {$dateNow->format('Y')}";

$newDateTimeZone = new DateTimeZone('Pacific/Apia');
$newDateTime = new DateTime("now", $newDateTimeZone);

var_dump([
    'Pacific/Apia' => $newDateTime->format(DATE_BR)
]);


/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);



/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2M1DT12H10M");

var_dump($dateInterval);

$dateTime = new DateTime('now');

$dateTime->sub($dateInterval);
$dateTime->add($dateInterval);

var_dump($dateTime);

$myBirth = new DateTime(date('2023') . "-02-10");
$myBorn = new DateTime("2003-02-10");
$today = new DateTime("now");

$diff = $today->diff($myBirth);

//invert = 1 data passada / invert = 0 data futura

var_dump($diff, $myBorn, $today->diff($myBorn)->y);

if ($diff->invert) {
    echo "<p> Seu ultimo aniversario foi a {$diff->days} dias </p>";
} else {
    echo "Faltam {$diff->days} dias para completar " . (($today->diff($myBorn)->y) + 1) . " anos de idade.</p>";
}

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$month = new DateInterval('P7D');
$recurrences = 12;

$datePeriod = new DatePeriod($myBorn, $month, $recurrences, DatePeriod::EXCLUDE_START_DATE);

var_dump($datePeriod);


foreach ($datePeriod as $date) {
    echo $date->format(DATE_BR) . '<br>';
}

$iso = 'R4/2012-07-01T00:00:00Z/P7D';

$periodIso = new DatePeriod($iso, DatePeriod::EXCLUDE_START_DATE);


echo '<br>';
echo '<hr>';
echo '<br>';


foreach ($periodIso as $date) {
    echo $date->format(DATE_BR) . '<br>';
}
