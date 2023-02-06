<?php
    
    class Person
    {
        
        public static function save($person)
        {
            //abre conexão com MySQL e define o charset para utf8mb
            $conn = new PDO(
                'mysql:host=localhost;port=3306;dbname=books',
                'root',
                '',
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if (empty($person['id'])) {
                $result = $conn->query("SELECT max(id) as next FROM people");
                $row = $result->fetch();
                
                $person['id'] = (int)$row['next'] + 1;
                
                $sql = "INSERT INTO people ( id, name, cep, address, district, phone, mail, city, state ) VALUES ( '{$person['id']}', '{$person['name']}', '{$person['cep']}', '{$person['address']}', '{$person['district']}', '{$person['phone']}', '{$person['mail']}', '{$person['city']}', '{$person['state']}' )";

            } else {
                $sql = "UPDATE people SET
                  name = '{$person['name']}',
                  cep = '{$person['cep']}',
                  address = '{$person['address']}',
                  district = '{$person['district']}',
                  phone = '{$person['phone']}',
                  mail = '{$person['mail']}',
                  city = '{$person['city']}',
                  state = '{$person['state']}'
              WHERE id = '{$person['id']}'
                  ";
            }
            
            return $conn->query($sql);
        }
        
        public static function find($id)
        {
            //abre conexão com MySQL e define o charset para utf8mb
            $conn = new PDO(
                'mysql:host=localhost;port=3306;dbname=books',
                'root',
                '',
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->query("SELECT * FROM people WHERE id='{$id}'");
            
            return $result->fetch();
        }
        
        public static function delete($id)
        {
            //abre conexão com MySQL e define o charset para utf8mb
            $conn = new PDO(
                'mysql:host=localhost;port=3306;dbname=books',
                'root',
                '',
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->query("DELETE FROM people WHERE id='{$id}'");
            
            return $result;
        }
        
        public static function all()
        {
            //abre conexão com MySQL e define o charset para utf8mb
            $conn = new PDO(
                'mysql:host=localhost;port=3306;dbname=books',
                'root',
                '',
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $result = $conn->query("SELECT * FROM people");
            
            return $result;
        }


        
    }
