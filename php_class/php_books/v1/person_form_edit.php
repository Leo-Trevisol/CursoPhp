<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'books');
    mysqli_set_charset($conn, 'utf8mb4');
    $query = "select * from people where id = {$id}";
    $result = mysqli_query($conn, $query);
    foreach ($result as $person) {
        extract($person);
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de pessoas</title>
    <link rel="stylesheet" href="_css/form.css">
</head>

<body>

    <form action="person_save_update.php" method="POST" enctype="multipart/form-data">

        <label for="id">Código</label>
        <input type="text" name="id" readonly style="width: 50%" value="<?php $id ?>">

        <label for="name">Nome</label>
        <input type="text" name="name" required style="width: 50%" value="<?php $name ?>">

        <label for="adress">Endereço</label>
        <input type="text" name="adress" required style="width: 50%" value="<?php $address?>">

        <label for="district">Bairro</label>
        <input type="text" name="district" required style="width: 50%" value="<?php $district?>">

        <label for="phone">Telefone</label>
        <input type="text" name="phone" required style="width: 50%" value="<?php $phone ?>">

        <label for="mail">E-mail</label>
        <input type="text" name="mail" required style="width: 50%" value="<?php $mail ?>">

        <label for="id_city">Cidade</label>
        <select name="id_city" required style="width: 50%">

            <?php

            require_once 'list_cities.php';
            print list_cities($id_city);

            ?>

        </select>


        <button class="btn btn-light-gray" type="submit" style="margin-top:20px">

            <img src="images/icons8-settings-50.svg" alt="img1" style="width: 50px ">

            ATUALIZAR

        </button>


    </form>

</body>

</html>
