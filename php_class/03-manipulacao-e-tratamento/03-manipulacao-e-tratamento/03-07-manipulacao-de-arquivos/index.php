<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

$file = __DIR__ . '/arquivo.txt';
if(file_exists($file) && (is_file($file))){
    echo "existe";
}else{
    echo "nao existe";
}

if(!file_exists($file) || !is_file($file)){
    $fileopen = fopen($file, "w");
    fwrite($fileopen, "AIIIIIIIIIIIIIII" . PHP_EOL . " LEOZINNNN");
    fclose($fileopen);

}else{
    var_dump(file($file),pathinfo($file));
}



/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);


/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

echo(file($file)[1]);

$filee=file('arquivo.txt');

echo count($filee).'<br>';
foreach($filee as $line)
{
   echo $line.'<br>';
};


$read = fopen($file, 'r');

while(!feof($read)){
    echo "<p> " . fgets($read) . "</p>";
}

$getcontents = __DIR__ . "/arquivo2.txt";

if(file_exists($getcontents) && is_file($getcontents)){
      echo file_get_contents($getcontents);
}else{

    $data = "<article><h1> leozin bacana (54) 98408-1674 </h1> </article>";
 file_put_contents($getcontents, $data);

}




/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

