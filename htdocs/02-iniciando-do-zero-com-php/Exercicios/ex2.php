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
    <label for="num">Digite o numero de cavalos:</label>
    <input type="number" id="d1" placeholder = "Numero de cavalos" name="num" required>
</div>

</div>

<div class="result">


<?php


$calcNumFerradura = function ($numCavalos){
    return $numCavalos * 4;
};



if(isset($_POST['b2'])) {
    echo "<h2> O numero de ferraduras eh " . $calcNumFerradura($_POST['num']) . "</h2>";
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








