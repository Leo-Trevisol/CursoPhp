<?php

$lista = __DIR__ . "/listaTelefonica.txt";

if(file_exists($lista) && (is_file($lista))){
   if (isset($_POST['name']) &&isset($_POST['number']) ) {
       file_put_contents($lista, "{$_REQUEST['name']} - {$_REQUEST['number']}" .PHP_EOL);
   }
}else{
  
      file_put_contents($lista, "{$_REQUEST['name']} - {$_REQUEST['number']}" .PHP_EOL, FILE_APPEND);
}

?>
 
 <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de telefones</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>

    <h1>Cadastro de telefones</h1>

    <form  action=""  method="post">

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name">
        <label for="number">Numero:</label>
        <input type="number" name="number" id="number">
        <input type="submit" name="bt" id="bt">

    </form>

    
</body>
</html>
