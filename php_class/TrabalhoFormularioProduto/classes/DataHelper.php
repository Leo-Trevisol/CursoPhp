<?php

class DataHelper{


    public static function dataBanco($data){

       self::$Format = explode(' ', $data);
       self::$Data = explode('/', self::$Format[0]);

       if(!checkdate(self::$data[1], self::$data[0], self::$data[2])):
        return false;
        
    }



}



?>
