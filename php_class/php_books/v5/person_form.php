<?php

require_once __DIR__ . '/classes/Person.php';



if (!empty($_REQUEST['action'])) {

try{
    if($_REQUEST['action'] == 'edit'){
        $id = $_GET['id'];
        $person = Person::find($id);
    }elseif($_REQUEST['action'] == 'save'){
        $person == $_POST;


        if(!empty($_POST['id'])){
            $result = Person::save($person);

        }else{
            $person['id'] = Person::find($person['id']);
            $result = Person::save($person);
        }

        print ($result ? '<div class="trigger trigger-sucess"> REGISTRO SALVO COM SUCESSO!</div>' : '<div class="trigger trigger-error"> ERRO AO SALVAR</div>' );

    }
}catch(Exception $e){
    print $e->getMessage();
}
}




$form = file_get_contents('html/form.html');
$form = str_replace(['{id}', '{name}', '{district}', '{phone}', '{mail}', '{city}', '{state}', '{cep}', '{address}'],
 [$id, $name, $district, $phone, $mail, $city, $state, $cep, $address], $form);
echo $form;
