<?php

require 'db/person_db.php';
$person = [
    'id' => '',
    'name' => '',
    'address' => '',
    'district' => '',
    'phone' => '',
    'mail' => '',
    'city' => '',
    'state' => '',
    'cep' => ''
];
extract($person);

if (!empty($_REQUEST['action'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'books');
    //define o charset para utf8mb
    mysqli_set_charset($conn, 'utf8mb4');

    if ($_REQUEST['action'] == 'edit') {
        $id =  filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $result = get_person($id);
            foreach ($result as $person) {
                extract($person);
            };
        } else {
            echo "<div class=\"trigger trigger-error\"><b>WOOPSS!</b> Desculpa não encontramos essa pessoa em nossa base de dados. Clique para <a href=\"person_read.php\" class=\"btn btn-ligth-gray\">
            <img src='images/icons8-cancel-50.svg' style='width:25px'>
            VOLTAR</a></div>";
        }
    } elseif ($_REQUEST['action'] == 'save') {
        //UPDATE : ATUALIZAR
        if (!empty($_POST['id'])) {
            extract($_POST);
            $sql = "UPDATE people SET name = '{$name}', address = '{$address}', district = '{$district}',
            phone = '{$phone}', mail = '{$mail}', city = '{$city}', state = '{$state}', cep = '{$cep}' WHERE id = {$id} ";
            $result = mysqli_query($conn, $sql);
            //CREATE: CADASTRA NOVA PESSOA
        } else {
            $_POST['id'] = get_next_id();
            $arrInsert = [
                'fields' => implode(', ', array_keys($_POST)),
                'values' => "'" . implode("', '", array_values($_POST)) . "'"
            ];

            $result = create_person($arrInsert);
        };
        print ($result) ? '<div class="trigger trigger-sucess">Registro salvo com sucesso!</div>' : mysqli_error(
            $conn
        );
    }
}

$form = file_get_contents('html/form.html');

$form = str_replace(['{id}', '{name}', '{district}', '{phone}', '{mail}', '{city}', '{state}', '{cep}', '{address}'], [$id, $name, $district, $phone, $mail, $city, $state, $cep, $address], $form);
echo $form;
