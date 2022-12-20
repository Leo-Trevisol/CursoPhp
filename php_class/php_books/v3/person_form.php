
    <?php

    $id = $name = $cep = $address = $district = $phone = $mail = $city = $state = null;

    if (!empty($_REQUEST['action'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'books');
        //define o charset para utf8mb
        mysqli_set_charset($conn, 'utf8mb4');

        if ($_REQUEST['action'] == 'edit') {
            $id = (int)$_GET['id'];
            if (is_int($id)) {
                $query = "SELECT * FROM people WHERE id = {$id}";
                $result = mysqli_query($conn, $query);
                foreach ($result as $person) {
                    extract($person);
                }
            } else {
                echo "<div class=\"trigger trigger-error\"><b>WOOPSS!</b> Desculpa não encontramos essa pessoa em nossa base de dados. Clique para <a href=\"person_read.php\" class=\"btn btn-ligth-gray\">
            <img src='images/icons8-cancel-50.svg' style='width:25px'>
            VOLTAR</a></div>";
            }
        } elseif ($_REQUEST['action'] == 'save') {
            //UPDATE : ATUALIZAR
            if (!empty($_POST['id'])) {
                extract($_POST);
                $sql = "UPDATE people SET name = '{$name}', address = '{$address}', district = '{$district}', phone = '{$phone}', mail = '{$mail}', city = '{$city}' WHERE id = {$id} ";
                $result = mysqli_query($conn, $sql);
                //CREATE: CADASTRA NOVA PESSOA
            } else {
                $result = mysqli_query($conn, 'SELECT max(id) as next FROM people');
                $_POST['id'] = (int)mysqli_fetch_assoc($result)['next'] + 1;

                $arrInsert = [
                    'fields' => implode(', ', array_keys($_POST)),
                    'values' => "'" . implode("', '", array_values($_POST)) . "'"
                ];
                $sql = "INSERT INTO people ({$arrInsert['fields']}) VALUES ({$arrInsert['values']})";
                $result = mysqli_query($conn, $sql);
            }
            print ($result) ? '<div class="trigger trigger-sucess">Registro salvo com sucesso!</div>' : mysqli_error(
                $conn
            );
        }
    } else {
        $person = [
            'id' => '',
            'name' => '',
            'address' => '',
            'district' => '',
            'phone' => '',
            'mail' => '',
            'city' => '',
            'state' => ''
        ];
        extract($person);
    }

    $form = file_get_contents('html/form.html');
    $form = str_replace(['{id}', '{name}', '{address}', '{district}', '{phone}', '{mail}', '{city}', '{state}'], [$id, $name, $address, $district, $phone, $mail, $city, $state], $form);

    echo $form;
