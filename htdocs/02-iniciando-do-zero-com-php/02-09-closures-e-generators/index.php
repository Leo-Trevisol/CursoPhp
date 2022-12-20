<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);

$myAge = function ($year){
    $age = date('Y') - $year;
     echo "<h1> voce tem {$age} anos </h1>";
};

$myAge(2003);


/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);

$iterator = 100;

function showDates($days){

$saveDate = [];
for ($day = 1; $day < $days; $day++){
    $saveDate [] = date("d/m/Y", strtotime("+{$day}days"));
};

return $saveDate;

};

foreach(showDates($iterator) as $date){
    echo "<small class='tag'> {$date} </small> ";
};


function generateDate($days){
    for($day =  1; $day < $days; $day++){
        yield date("d/m/Y", strtotime("+{$day}days"));
    };
};

foreach(generateDate($iterator) as $date){
    echo "<small class='tag'> {$date} </small> ";
};