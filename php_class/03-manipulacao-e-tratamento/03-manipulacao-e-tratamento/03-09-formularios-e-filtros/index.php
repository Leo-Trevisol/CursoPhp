<?php
require __DIR__ . '/../../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.09 - Formuários e filtros");

/*
 * [ request ] $_REQUEST
 * https://php.net/manual/pt_BR/book.filter.php
 */
fullStackPHPClassSession("request", __LINE__);

$form = new StdClass();
$form -> name = 'a';
$form ->mail = 'a@leo';

var_dump($_REQUEST);
$form ->method = 'post';
include __DIR__ . '/form.php';


/*
 * [ post ] $_POST | INPUT_POST | filter_input | filter_var
 */
fullStackPHPClassSession("post", __LINE__);

var_dump($_POST);

$post['name'] = filter_input( INPUT_POST,'name', FILTER_DEFAULT);
$postarray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump($post, $postarray);

include __DIR__ . '/form.php';

if($postarray){
    if(in_array('', $postarray)){
        echo "<p class ='trigger warning'> PREECNHA TODOS OS CAMPOS</p>";
    }
}elseif(!filter_var($postarray['mail'], FILTER_VALIDATE_EMAIL)){
    echo "<p class ='trigger warning'> EMAIL INVALIDO</p>";
}else{
    $postarray = array_map('strip_tags', $postarray);
  
    $save = array_map("trim", $postarray);
    var_dump($save);
    echo "<p class='trigger accept'> EMAIL ENVIADO COM SUCESSO</p>";
}


/*
 * [ get ] $_GET | INPUT_GET | filter_input | filter_var
 */
fullStackPHPClassSession("get", __LINE__);

var_dump($_GET);




/*
 * [ filters ] list | id | var[_array] | input[_array]
 * http://php.net/manual/pt_BR/filter.constants.php
 */
fullStackPHPClassSession("filters", __LINE__);

var_dump(
    filter_list(),
    [
        filter_id('validade_mail'),
        FILTER_VALIDATE_DOMAIN,
        FILTER_SANITIZE_STRING
    ]
    );

    $filterForm = [
        'name' => FILTER_SANITIZE_STRIPPED,
        'mail' => FILTER_VALIDATE_EMAIL
    ];

    $getform = filter_input_array(INPUT_GET, $filterForm);

    var_dump($getform);

    $email = 'leozin@gmail.com';

    var_dump(
        [
            filter_var($email, FILTER_VALIDATE_EMAIL)
        ], filter_var_array($getform, $filterForm)
    );
