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
    <label for="num">Digite o numero de um mes:</label>
    <input type="number" id="d1" placeholder = "Mes" name="mes" required>
</div>
<div class="gp">
    <label for="num">Digite um dia desse mes:</label>
    <input type="number" id="d1" placeholder = "Dia" name="dia" required>
</div>

</div>

<div class="result">


<?php


$diasPassadps = function ($mes, $dia){

  $diasTotais = ($mes * 30) + $dia;


    return "<h2> Se passaram {$diasTotais} des do inicio do ano ate essa data </h2>";


};



if(isset($_POST['b2'])) {
  echo $diasPassadps($_POST['mes'], $_POST['dia']);
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








