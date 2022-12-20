<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de pessoas</title>
    <link rel="stylesheet" href="_css/form.css">
</head>

<body>

    <form action="person_save_insert.php" method="POST" enctype="multipart/form-data">

        <label for="id">Código</label>
        <input type="text" name="id" readonly style="width: 50%" value="">

        <label for="name">Nome</label>
        <input type="text" name="name" required style="width: 50%" value="">

        <label for="adress">Endereço</label>
        <input type="text" name="adress" required style="width: 50%" value="">

        <label for="district">Bairro</label>
        <input type="text" name="district" required style="width: 50%" value="">

        <label for="phone">Telefone</label>
        <input type="text" name="phone" required style="width: 50%" value="">

        <label for="mail">E-mail</label>
        <input type="text" name="mail" required style="width: 50%" value="">

        <label for="id_city">Cidade</label>
        <select name="id_city" required style="width: 50%">

            <?php

            require_once 'list_cities.php';
             print list_cities();

            ?>

        </select>


        <button class="btn btn-light-gray" type="submit">

            <img src="images/icons8-settings-50.svg" alt="img1" style="width: 50px">

            SALVAR

        </button>


    </form>

</body>

</html>
