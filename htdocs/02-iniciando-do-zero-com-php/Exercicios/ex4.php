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

<h1>Exericio 4</h1>



<form method = "post"> 

<div class = "flex-box justify-center align-itens-center">
<div class="gp">
    <label for="num">Digite seu nome:</label>
    <input type="text" id="d1" placeholder = "Nome" name="name" required>
</div>
<div class="gp">
    <label for="num">Digite sua idade:</label>
    <input type="number" id="d2" placeholder = "Idade" name="age" required>
</div>

</div>

<div class="result">


<?php


$calcInfos = function ($name, $age){

    $days = $age * 365;

    return "<h2> Seu nome eh {$name}" . " e voce viveu aproximadamente {$days}" . " dias.";


};



if(isset($_POST['b2'])) {
  echo $calcInfos($_POST['name'], $_POST['age']);
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








