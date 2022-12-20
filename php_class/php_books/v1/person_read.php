<?php

$postdata
    = $_POST;

$conn = mysqli_connect('localhost', 'root', '', 'books');

mysqli_set_charset($conn, 'utf8mb4');

$query = 'select * from people order by id asc';

$result = mysqli_query($conn, $query);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de pessoas</title>
    <link rel="stylesheet" href="_css/form.css">
    <link rel="stylesheet" href="_css/table.css">
</head>

<body>

    <section class="list">

        <table>
            <thead>
                <tr class="header">
                    <th></th>
                    <th></th>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Distrito</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($result as $person) {
                    extract($person);
                    print "<tr> <td class='center'><a href = 'person_form_edit.php?id={$id}'><img src='images/icons8-edit-50.svg'
            style= 'width:25px'></a> </td>
            <td class ='center'><a href='person_delete.php?id={$id}'><img src = 'images/icons8-trash-can-50.svg' style='width:25px'> </a> </td>
            <td> {$id} </td>
            <td> {$name}</td>
            <td> {$address}</td>
            <td>{$district} </td>
            <td>{$phone} </td>
            </tr>";
                }
                ?>
            </tbody>
        </table>

        <button onclick="window.location='person_form_insert.php'" class="btn btn-light-gray">
            <img src="images/icons8-settings-50.svg" alt="" style="width: 25px"> Inserir
        </button>

    </section>

</body>

</html>
