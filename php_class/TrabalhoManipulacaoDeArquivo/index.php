<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

$file = __DIR__ . '/listaTelefonica.txt';



if(file_exists($file) && (is_file($file))){
    
}else{
    echo "nao existe";
}




/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);


/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);


/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

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

    <?php

    $read = fopen($file, 'r');
    while (!feof($read)){
            echo "<article> " , "<span></span> " , "<b> </b>", "</article>";
        }

        $name = $_POST['name'];
$number = $_POST['number'];

if(!file_exists($file) || !is_file($file)){
    $fileopen = fopen($file, "w");
    fwrite($fileopen, $name . PHP_EOL . $number);
    fclose($fileopen);

}
    

    ?>
    
</body>
</html>