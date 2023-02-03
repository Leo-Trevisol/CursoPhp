<?php

class Person{

    public static function save($person){
        $conn = new PDO(
            'mysql:host=localhost;port=3306;dbname=books', 'root', '',
            [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']
        );

        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(empty($person['id'])){
            $resul = $conn->query("select max(id) as next from people");
            $row = $result->fetch();

            $person['id'] = (int)$row['next'] + 1;

            $sql = "insert into people (id, name, cep, address, district, phone, mail, city, state) values
             ( '{$person['id']}', '{$person['name']}','{$person['address']}', '{$person['district']}', '{$person['phone']}', '{$person['mail']}','{$person['city']}', '{$person['state']}', '{$person['cep']}')";
        }else{
            $sql = "Update people set people.name = '{$person['name']}, 
            people.cep = '{$person['cep']},
            people.address = '{$person['address']},
            people.district = '{$person['district']},
            people.phone = '{$person['phone']},
            people.mail = '{$person['mail']},
            people.city = '{$person['city']},
            people.state = '{$person['state']},
            people.id = '{$person['id']}
            ";
        }
    }

 return $conn-> query($sql);

}

public static function find(){
    
}

?>