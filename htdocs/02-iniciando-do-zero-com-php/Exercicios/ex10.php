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
    <label for="num">Digite o X do ponto A</label>
    <input type="number" id="d1" placeholder = "X : plano A" name="ax" required>
    <label for="num">Digite o y do plano A:</label>
    <input type="number" id="d1" placeholder = "Y : plano A" name="ay" required>
</div>
<div class="gp">
    <label for="num">Digite o X do plano B:</label>
    <input type="number" id="d1" placeholder = "X: plano B" name="bx" required>
    <label for="num">Digite o Y do plano B:</label>
    <input type="number" id="d1" placeholder = "Y: plano b" name="by" required>
</div>

</div>

<div class="result">


<?php


$calcCartesiano = function ($ax, $ay, $bx, $by){

$calculo = pow[(($bx - $ax) * 2) + (($by - $ay) *2)];

    return "<h2> {$calculo} </h2>";


};



if(isset($_POST['b2'])) {
  echo $calcCartesiano($_POST['ax'], $_POST['ay'], $_POST['bx'], $_POST['by']);
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








