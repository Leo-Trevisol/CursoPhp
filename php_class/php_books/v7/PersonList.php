<?php

require_once __DIR__ '/classes/Person.php';

Class PersonList{

    public function __construct(){



    }

    public funcrion load(){

        try{
            $rows = '';
            foreach(Person :: all() as $person){
                $row = file_get_contents('html/row.html');

                $this-> html = str_replace(['{id}', '{cep}', '{name}', '{address}', '{district}',
                '{phone}'], [$this->data['id'], $this->data['cep'],
                 $this->data['name'], $this->data['address'], $this->data['id']]);
            }
        }
    }
}