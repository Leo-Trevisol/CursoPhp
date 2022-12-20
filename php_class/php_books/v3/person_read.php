
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'books');
    //define o charset para utf8mb
    mysqli_set_charset($conn, 'utf8mb4');
    /*Exclui registro do Banco*/
    if (!empty($_GET['action']) && $_GET['action'] == 'delete') {
        $delId = (int)$_GET['id'];
        $result = mysqli_query($conn, "DELETE FROM people WHERE id='{$delId}'");
    }

    $rows = null;
    //Lista registros
    $result = mysqli_query($conn, 'SELECT * FROM people ORDER BY id ASC');
    mysqli_close($conn);

    foreach ($result as $person) {
        extract($person);
        $row = file_get_contents('html/rows.html');
        $row = str_replace(
            ['{id}', '{name}', '{address}', '{district}', '{phone}'],
            [$id, $name, $address, $district, $phone],
            $row
        );

        $rows .= $row;
    }

    $list = file_get_contents('html/list.html');
    $list = str_replace(['{rows}'], [$rows], $list);

    echo $list;
