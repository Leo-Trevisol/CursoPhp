<?php

$lista = __DIR__ . "/listaTelefonica.txt";

if(file_exists($lista) || (is_file($lista))){
  
      $data = "{$_REQUEST['name']} - {$_REQUEST['number']}" .PHP_EOL;
       file_put_contents($lista, $data, FILE_APPEND);
}

if(!file_exists($lista) || !is_file($lista)){
   $fileopen = fopen($lista, "w");
}
?>
 
 <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de telefones</title>
    <link rel="stylesheet" href="cs.css">
</head>
<body>

<div id="container">

    <h1>Cadastro de telefones</h1>

    <form  action=""  method="post">

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name">
        <label for="number">Numero:</label>
        <input type="number" name="number" id="number">
        <input type="submit" name="bt" id="bt">

    </form>

    <div class="dois">

    <?php

$read = fopen($lista, 'r');
  // $read = fopen(__DIR__ . "../listaTelefonica.txt", "r");
   while (($linha = fgets($lista)) !== false ){
      if(!feof($lista)){
     
         
      $line = explode(" - ", fgets($read));
        echo " <div class='line mesmo'> {$line['0']} - {$line['1']} </div>";
      }
    }
  
  ?>
</div>
   </div>
    
</body>
</html>

