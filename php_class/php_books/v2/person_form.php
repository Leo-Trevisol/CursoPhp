<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Pessoas</title>
    <link rel="stylesheet" href="_css/form.css">
    <script src="_js/jquery.js"></script>
    <script src="_js/maskinput.js"></script>
    <script src="_js/script.js"></script>
</head>

<body>

    <?php
    $id = $name = $cep = $address = $district = $phone = $mail = $city = $state = null;

    if (!empty($_REQUEST['action'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'books');
        //define o charset para utf8mb
        mysqli_set_charset($conn, 'utf8mb4');

        if ($_REQUEST['action'] == 'edit') {
            $id = $_GET['id'];
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
    }
    ?>

    <form action="person_form.php?action=save" class="form_capitalize" method="post" enctype="multipart/form-data">

        <label for="">Código</label>
        <input type="number" name="id" value="<?= $id ?>" readonly style="width: 30%">

        <label for="">Nome</label>
        <input type="text" name="name" value="<?= $name; ?>" required style="width: 50%">

        <label for="">CEP</label>
        <input type="text" name="cep" class="wc_getCep formCep" value="<?= $cep ?>" required style="width: 50%">

        <label for="">Endereço</label>
        <input type="text" name="address" class="cep_address" value="<?= $address ?>" required style="width: 50%">

        <label for="">Bairro</label>
        <input type="text" name="district" class="cep_district" value="<?= $district ?>" required style="width: 50%">

        <label for="">Telefone</label>
        <input type="text" name="phone" class="formPhone" value="<?= $phone ?>" required style="width: 50%">

        <label for="">E-mail</label>
        <input type="email" name="mail" value="<?= $mail ?>" required style="width: 50%">

        <label for="">Cidade</label>
        <input type="text" name='city' class="cep_city" value="<?= $city ?>" required style='width: 50%'>

        <label for="">UF</label>
        <input type="text" name='state' class="cep_uf" value="<?= $state ?>" required style='width: 50%'>

        <label class="actions">
            <a href="person_read.php" class="btn btn-ligth-gray">
                <img src='images/icons8-cancel-50.svg' style='width:25px'>
                VOLTAR</a>

            <button class='btn btn-ligth-gray' type='submit'>
                <img src='images/icons8-settings-50.svg' style='width:25px'>
                SALVAR
            </button>
        </label>
    </form>
</body>

</html>
