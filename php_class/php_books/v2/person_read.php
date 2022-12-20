<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Pessoas</title>
    <link rel="stylesheet" href="_css/form.css">
    <link rel="stylesheet" href="_css/table.css">
</head>

<body>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'books');
    //define o charset para utf8mb
    mysqli_set_charset($conn, 'utf8mb4');
    /*Exclui registro do Banco*/
    if (!empty($_GET['action']) && $_GET['action'] == 'delete') {
        $delId = (int)$_GET['id'];
        $result = mysqli_query($conn, "DELETE FROM people WHERE id='{$delId}'");
    }
    //Lista registros
    $result = mysqli_query($conn, 'SELECT * FROM people ORDER BY id ASC');
    mysqli_close($conn);
    ?>

    <section class="list">
        <table>
            <thead>
                <tr class="header">
                    <th></th>
                    <th></th>
                    <th> ID.</th>
                    <th> Nome</th>
                    <th> Endereço</th>
                    <th> Distrito</th>
                    <th> Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                /* while ($row = mysqli_fetch_assoc($result)) {
                 $id = $row['id'];
                 $name = $row['name'];
                 $address = $row['address'];
                 $district = $row['district'];
                 $phone = $row['phone'];
                 $mail = $row['mail'];
                 $id_city = $row['id_city'];
                 print '<tr>';
                 print "<td class='center'> <a href='person_form_edit.php?id={$id}'> </a></td>";
                 print "<td class='center'> <a href='person_delete.php?id={$id}'> <img src='images/icons8-trash-can-50.svg' style='width:17px'> </a></td>";
                 print "<td> {$id} </td>";
                 print "<td> {$name} </td>";
                 print "<td> {$address} </td>";
                 print "<td> {$district} </td>";
                 print "<td> {$phone} </td>";
                 print '</tr>';
             }*/
                foreach ($result as $person) {
                    extract($person);
                    print "
                    <tr>
                        <td class='center'><a href='person_form.php?action=edit&id={$id}'><img src='images/icons8-edit-50.svg' style='width:25px'> </a></td>
                        <td class='center'><a href='person_read.php?action=delete&id={$id}'><img src='images/icons8-trash-can-50.svg' style='width:25px'> </a></td>
                        <td> {$id} </td>
                        <td> {$name} </td>
                        <td> {$address} </td>
                        <td> {$district} </td>
                        <td> {$phone} </td>
                    </tr>
                ";
                }
                ?>
            </tbody>
        </table>
        <button onclick="window.location='person_form.php'" class="btn btn-ligth-gray">
            <img src='images/icons8-settings-50.svg' style='width:25px'> Inserir
        </button>
    </section>

</html>
