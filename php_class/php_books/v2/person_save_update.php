<?php

$postdata = $_POST;

$conn = mysqli_connect('localhost', 'root', '', 'books');

mysqli_set_charset($conn, 'utf8mb4');

$query = "update people ( name, address, district, phone, mail, id_city) values ( '{$postdata['name']}', '{$postdata['adress']}'
, '{$postdata['district']}', '{$postdata['phone']}', '{$postdata['mail']}' , '{$postdata['id_city']}') where id = '{$postdata['id']}'";

$result = mysqli_query($conn, $query);

if ($result) {
    print 'Resgitro atualizado!';
} else {
    print mysqli_error($conn);
}
mysqli_close($conn);
