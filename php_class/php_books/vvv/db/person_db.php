<?php

function person_list()
{
    $conn = db_connection();
    $query = 'select * from people order by id asc';

    $result = mysqli_query($conn, $query);
    mysqli_close($conn);

    return $result;
}

function person_delete($id)
{
    $conn = db_connection();

    $result = mysqli_query($conn, "DELETE FROM people WHERE id = '{$id}'");
    mysqli_close($conn);

    return $result;
}

function get_person($id)
{
    $conn = db_connection();
    $query = "SELECT * FROM people WHERE id = {$id}";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);

    return $result;
}
function update_person($person)
{
    $conn = db_connection();

    $sql = "UPDATE people SET name = '{$person['name']}', address = '{$person['address']}', district = '{$person['district']}',phone = '{$person['phone']}', mail = '{$person['mail']}', city = '{$person['city']}', state = '{$person['state']}', cep = '{$person['cep']}' WHERE id = {$person['id']} ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result;
}

function create_person($arrInsert)
{
    $conn = db_connection();
    $sql = "INSERT INTO people ({$arrInsert['fields']}) VALUES ({$arrInsert['values']})";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result;
}

function get_next_id()
{
    $conn = db_connection();
    $result = mysqli_query($conn, 'SELECT max(id) as next FROM people');
    $next = (int)mysqli_fetch_assoc($result)['next'] + 1;
    mysqli_close($conn);
    return $next;
}

function db_connection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'books');
    mysqli_set_charset($conn, 'utf8mb4');
    return $conn;
}
