<?php
    
    function person_list()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'books');
        //define o charset para utf8mb
        mysqli_set_charset($conn, 'utf8mb4');
        $query = 'SELECT * FROM people ORDER BY id';
        $result = mysqli_query($conn, $query);
        // $list = mysqli_fetch_all($result);
        mysqli_close($conn);
        
        return $result;
    }
    
    function person_delete($id)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'books');
        //define o charset para utf8mb
        mysqli_set_charset($conn, 'utf8mb4');
        $query = "DELETE FROM people WHERE id ='{$id}'";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        
        return $result;
    }
    
    function get_person($id)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'books');
        //define o charset para utf8mb
        mysqli_set_charset($conn, 'utf8mb4');
        $query = "SELECT * FROM people WHERE id='{$id}'";
        $result = mysqli_query($conn, $query);
        $person = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        
        return $person;
    }
    
    function get_next_person()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'books');
        //define o charset para utf8mb
        mysqli_set_charset($conn, 'utf8mb4');
        $result = mysqli_query($conn, 'SELECT max(id) as next FROM person');
        $next = (int)mysqli_fetch_assoc($result)['next'] + 1;
        mysqli_close($conn);
        
        return $next;
    }
    
    function insert_person($person)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'books');
        //define o charset para utf8mb
        mysqli_set_charset($conn, 'utf8mb4');
        $query = "INSERT INTO people (id, name, address, district, phone, mail, id_city) VALUES ('{$person['id']}', '{$person['name']}', '{$person['address']}', '{$person['district']}', '{$person['phone']}', '{$person['mail']}', '{$person['id_city']}')";
        $result = mysqli_query($conn, $query);
        //$person = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        
        return $result;
    }
    
    function update_person($person)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'books');
        //define o charset para utf8mb
        mysqli_set_charset($conn, 'utf8mb4');
    
        /*$setUpdate = null;
        foreach ($person as $key => $value){
            $setUpdate .= "{$key} = '{\$person['$key']}', ";
        }
        $setUpdate = mb_strcut($setUpdate, strpos($setUpdate, ','), '') ;*/
        
        $query = "
            UPDATE people SET
                  name = '{$person['name']}',
                  address = '{$person['address']}',
                  district = '{$person['district']}',
                  phone = '{$person['phone']}',
                  mail = '{$person['mail']}',
                  id_city = '{$person['id_city']}'
            WHERE id = '{$person['id']}'
        ";
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        
        return $result;
    }
