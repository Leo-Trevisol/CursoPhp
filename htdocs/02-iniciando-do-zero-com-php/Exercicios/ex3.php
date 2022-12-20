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

<h1>Exericio 3</h1>



<form method = "post"> 

<div class = "flex-box justify-center align-itens-center">
<div class="gp">
    <label for="num">Digite a quantidade de paes vendidos:</label>
    <input type="number" id="d1" placeholder = "Paes vendidos" name="paes" required>
</div>
<div class="gp">
    <label for="num">Digite a quantidade de broas vendidas:</label>
    <input type="number" id="d2" placeholder = "Broas vendidas" name="broas" required>
</div>

</div>

<div class="result">


<?php


$calValorTotal = function ($numPaes, $numBroas){

    $valorTotal = ($numPaes * 0.12) + ($numBroas * 1.50);

    $valorPoupanca = (10 * $valorTotal ) / 100;

    $valorPoupanca = number_format($valorPoupanca, 2, '.', '');

    
    return "<h2> O valor total arrecadado do dia foi de R$ {$valorTotal}" . ", adicionado R$ {$valorPoupanca}" . " na poupanca. </h2>";
};



if(isset($_POST['b2'])) {
  echo  $calValorTotal($_POST['paes'], $_POST['broas']);
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








