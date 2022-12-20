<?php

$postData = $_POST;
$conn = mysqli_connect("localhost", "root", "", "books");
mysqli_set_charset($conn, 'utf8mb4');
$query = 'SELECT max(id) as next FROM people';
$result = mysqli_query($conn, $query);
$next = (int) mysqli_fetch_assoc($result)['next'] + 1;

$sql = "UPDATE people SET name = '{$postData['name']}', address='{$postData['address']}',
 district='{$postData['district']}', phone='{$postData['phone']}', mail='{$postData['mail']}',
  id_city='{$postData['id_city']}' WHERE id = {$postData['id']}";

$result = mysqli_query($conn, $sql);
if ($result) {
    print"Registro inserido com sucesso!";
} else {
    print mysqli_error($conn);
}

mysqli_close($conn);
