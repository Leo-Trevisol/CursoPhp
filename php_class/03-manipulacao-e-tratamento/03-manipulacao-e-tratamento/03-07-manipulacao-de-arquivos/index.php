<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

$file = __DIR__ . '/arquivo.txt';
if(file_exists($file) && (is_file($file))){
    echo "existe";
}else{
    echo "nao existe";
}

if(!file_exists($file) || !is_file($file)){
    $fileopen = fopen($file, "w");

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


/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);