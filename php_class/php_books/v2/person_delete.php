<?php

$detId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$teste = filter_input(INPUT_GET, 'teste');

if ($detId) {
    $conn = mysqli_connect('localhost', 'root', '', 'books');

    mysqli_set_charset($conn, 'utf8mb4');

    $query = "select *  from people where id = {$detId}";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $del = mysqli_query($conn, "delete from people where id = {$detId}");
        print($del ? 'registro excluido'  :  mysqli_error($conn));
    } else {
        print mysqli_error($conn);
    }

    mysqli_close($conn);
}
