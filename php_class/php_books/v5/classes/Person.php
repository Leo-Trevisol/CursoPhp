<?php

class Person{

    public static function save($person){
        $conn = new PDO(
            'mysql:host=localhost;port=3306;dbname=books', 'root', '',
            [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']
        );

        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(empty($person['id'])){
            $resul = $conn->query("select max(id) as next from person");
            $row = $result->fetch();

            $person['id'] = (int)$row['next'] + 1;

            $sql = "insert into people (id, name, cep, address, district, phone, mail, city, state) values ( '{$person['id']}', '{$person['name']}','{$person['address']}', '{$person['district']}', '{$person['phone']}', '{$person['mail']}','{$person['city']}', '{$person['state']}', '{$person['cep']}')";
        }
    }

    public static function find($id){
        $conn = new PDO('my')
    }

}

?>