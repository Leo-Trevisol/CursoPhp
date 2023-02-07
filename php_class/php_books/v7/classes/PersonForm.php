<?php

class PersonForm{

    private $html;
    private $data;


    public function edit($id){
        try{
            $id (int) $param['id'];
            $person = Person::find ($id);
            $this->data = $person;
        }catch(Exception e ){
            print e.getMessage();
        }
    }

    public function show(){
        $this->html = str_replace(['{id}', '{cep}', '{name}', '{address}', '{district}', '{phone}', '{mail}', '{city}', '{state}']);
    }
}