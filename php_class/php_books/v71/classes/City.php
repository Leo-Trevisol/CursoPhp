<?php
    
    class City
    {
        
        public static function all($id = null)
        {
    
            $conn = new PDO(
                'mysql:host=localhost;port=3306;dbname=books',
                'root',
                '',
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            $result = $conn->query("SELECT id, name FROM cities");
            if ($result) {
                $output = "<option value='' selected disabled>SELECIONE A CIDADE:</option>";
                
                foreach ($result as $city) {
                    $checked = ($city['id'] == $id) ? 'selected' : '';
                    $output .= "<option {$checked} value='{$city['id']}'> {$city['name']} </option>";
                }
            }
            
            return $output;
        }
    }
