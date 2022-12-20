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
    <label for="num">Digite o preco do litro da gasolina:</label>
    <input type="number" id="d1" placeholder = "Preco da gasolina" name="preco" required>
</div>
<div class="gp">
    <label for="num">Digite quantos R$ botaste de gasolina:</label>
    <input type="number" id="d2" placeholder = "R$ de gasolina abastecida" name="reais" required>
</div>

</div>

<div class="result">


<?php


$calcInfos = function ($preco, $valor){

    $litros = number_format($valor / $preco, 2, '.', '');



    

    return "<h2> O preco do litro da gasolina eh {$preco}" . ", foram abastecidos {$litros}" . " litros, por {$valor}";


};



if(isset($_POST['b2'])) {
  echo $calcInfos($_POST['preco'], $_POST['reais']);
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








