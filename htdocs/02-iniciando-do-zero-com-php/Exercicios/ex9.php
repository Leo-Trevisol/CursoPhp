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
    <label for="num">Digite a quantidade de camisetas pequenas vendidas:</label>
    <input type="number" id="d1" placeholder = "Camisetas P" name="p" required>
</div>
<div class="gp">
    <label for="num">Digite a quantidade de camisetas medias vendidas:</label>
    <input type="number" id="d1" placeholder = "Camisetas M" name="m" required>
</div>
<div class="gp">
    <label for="num">Digite a quantidade de camisetas grandes vendidas:</label>
    <input type="number" id="d1" placeholder = "Camisetas G" name="g" required>
</div>

</div>

<div class="result">


<?php


$calculo = function ($p, $m, $g){

  $valorTotal = number_format(($p * 10) + ($m *12) + ($g * 15), 2, '.', '');


    return "<h2> Foram vendidas {$p} camisetas P, {$m} camisetas M e {$g} camisetas G, total da venda foi de R$ {$valorTotal} </h2>";


};



if(isset($_POST['b2'])) {
  echo $calculo($_POST['p'], $_POST['m'], $_POST['g']);
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








