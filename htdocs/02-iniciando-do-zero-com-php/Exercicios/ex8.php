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
    <label for="num">Digite a primeira nota:</label>
    <input type="number" id="d1" placeholder = "Valendo 1 ponto" name="nota1" required>
</div>
<div class="gp">
    <label for="num">Digite a segunda nota:</label>
    <input type="number" id="d1" placeholder = "Valendo 2 pontos" name="nota2" required>
</div>
<div class="gp">
    <label for="num">Digite a terceira nota:</label>
    <input type="number" id="d1" placeholder = "Valendo 3 pontos" name="nota3" required>
</div>

</div>

<div class="result">


<?php


$calculo = function ($n1, $n2, $n3){

  $mediaPonderada = (($n1 * 1) + ($n2 * 2) + ($n3 * 3)) / (6);


    return "<h2> Nota 1: {$n1}, nota 2: {$n2} e nota 3: {$n3}. Media: {$mediaPonderada} </h2>";


};



if(isset($_POST['b2'])) {
  echo $calculo($_POST['nota1'], $_POST['nota2'], $_POST['nota3']);
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








