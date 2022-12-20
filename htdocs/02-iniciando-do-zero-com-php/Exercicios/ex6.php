<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Exericio 2</h1>



<form method = "post"> 

<div class = "flex-box justify-center align-itens-center">
<div class="gp">
    <label for="num">Digite o peso do prato:</label>
    <input type="number" id="d1" placeholder = "Peso do prato" name="peso" required>
</div>

</div>

<div class="result">


<?php

define('prato', 12);


$calcValorPrato = function ($peso){

    $valorPrato = $peso * 12;


    return "<h2> O prato de {$peso} Kgs vai custar {$valorPrato} </h2>";


};



if(isset($_POST['b2'])) {
  echo $calcValorPrato($_POST['peso']);
};


?>


</div>

<div class="flex-box-action">
    <button class="red" type="reset" name="b1">Limpar</button>
    <button class="green" type = "submit" name="b2">Calcular</button>

</div>


</form>
    
</body>
</html>








