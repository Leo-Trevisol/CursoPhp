<?php
require __DIR__ . '/../../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.10 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

$folder = __DIR__ . "/uploads";

if(!file_exists($folder) || !is_dir($folder)){
    //MKDIR CRIA DIRETORIOS
    mkdir($folder, 0755);
}

var_dump(
    [
        "filesize" => ini_get("upload_max_filesize"),
        "postsize" => ini_get("post_max_size")
    ]
    );

    var_dump(
        [
            filetype(__DIR__ . '/index.php'),
            mime_content_type(__DIR__ . '/index.php')
        ]
        );

        $getpost = filter_input(INPUT_GET, 'post', FILTER_VALIDATE_BOOLEAN);

        if($_FILES && !empty($_FILES['file']['name'])){
            var_dump($_FILES);
                $fileupload = $_FILES['file'];
                var_dump($fileupload);

                $allowedtypes = [
                    'image/jpg',
                    'image/jpeg',
                    'image/png',
                    'application/pdf'
                ];

                $newfilename = time() . mb_strstr($fileupload['name'], '.');

                if(in_array($fileupload['type'], $allowedtypes)){
                    if(move_uploaded_file($fileupload['tmp_name'], __DIR__ . "/uploads/{$newfilename}")){
                        echo "<p class = 'trigger accept' > ARQUIVO ENVIADO COM SUCESSO </p>";
                    }else{
                        echo "<p class = 'trigger error' > ERRO INESPERADO </p>";
                    }
                }else{
                    echo "<p class = 'trigger warning' > TIPO DE ARQUIVO NAO PERMITIDO </p>";
                }
            }elseif($getpost){
                echo "<p class = 'trigger warning' > ARQUIVO MUITO GRANDE  </p>";
            }else{
                echo "<p class = 'trigger accept' > SELECIONE O ARQUIVO ANTES DE ENVIAR </p>";
            }

            include_once __DIR__ . '/form.php';
            var_dump(scandir(__DIR__ . "/uploads"));    
      

        



