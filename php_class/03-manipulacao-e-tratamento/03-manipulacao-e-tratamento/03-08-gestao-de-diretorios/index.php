<?php
require __DIR__ . '/../../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);

$folder = __DIR__ . "/uploads";

if(!file_exists($folder) || !is_dir($folder)){
    mkdir($folder, 777); 
}else{
   var_dump(scandir($folder));
}


/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);

$file = __DIR__ . "/file.txt";
var_dump( 
    [
        pathinfo($file),
        scandir($folder),
        scandir(__DIR__)
    ]
    );

    if(!file_exists($file) && !is_dir($file)){
        fopen($file, "w");
    }else{
        copy($file, $folder . "/" . basename($file));
        var_dump(filemtime($file), filemtime(__DIR__ . "/uploads/file.txt"));

          rename( $file, __DIR__ . "/uploads/" . time().".".pathinfo($file)
    ['extension']);

    }

  


/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);

$folder1 = __DIR__ . "/remove";

if(!file_exists($folder1) || !is_dir($folder1)){
    mkdir($folder1, 777); 
}else{
   var_dump(scandir($folder1));
}

$dirRemove = __DIR__ . "/remove";
$dirFile = array_diff(scandir($dirRemove), ['.', '..'] );
$dirCount = count($dirFile);

var_dump($dirFile, $dirCount);

//APAGA OS ARQUIVOS 1 POR 1

if($dirCount >= 1 ){
    foreach($dirFile as $file){
        echo basename($file);
        unlink($dirRemove . "/" . basename($file));
        
    }
//RMDIR REMOVE O DIRETORIO SE ESTIVER VAZIO
   
}else{
    rmdir($dirRemove);
}
