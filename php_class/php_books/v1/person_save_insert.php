<?php

$postdata = $_POST;

$conn = mysqli_connect('localhost', 'root', '', 'books');

mysqli_set_charset($conn, 'utf8mb4');

$query = 'select max(id) as next from people';
$result = mysqli_query($conn, $query);
$next = (int) mysqli_fetch_assoc($result)['next'] + 1;

$sql = "insert into people (id, name, address, district, phone, mail, id_city) values ('{$next}', '{$postdata['name']}', '{$postdata['adress']}'
, '{$postdata['district']}', '{$postdata['phone']}', '{$postdata['mail']}' , '{$postdata['id_city']}') ";

$result = mysqli_query($conn, $sql);

if ($result) {
    print 'Resgitro concluido!';
} else {
    print mysqli_error($conn);
}
mysqli_close($conn);
