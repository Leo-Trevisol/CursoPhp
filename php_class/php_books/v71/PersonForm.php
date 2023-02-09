<?php

require_once __DIR__ . '/classes/Person.php';

class PersonForm{

    private $html;
    private $data;

  public function __construct(){
    $this->html = file_get_contents('html/form.html');
    $this->data = [
        'id' => null, 
        'cep' => null, 
        'name' => null, 
        'address' => null, 
        'district' => null, 
        'phone' => null, 
        'mail' => null, 
        'city' => null, 
        'state' => null
    ];
  }






    public function edit($param){
        try{
            $id = (int) $param['id'];
            $person = Person::find ($id);
            $this->data = $person;
        }catch(Exception $e ){
            print $e->getMessage();
        }
    }


    public function save($param){
        try{
            Person::save($param);
            $this->data = $param;
            print "<div class ' trigger trigger-sucess center ' <p> Pessoa salva com sucesso! </p> </div>";
        }catch(Exception $e){
            print $e->getMessage();
        }
    }

    public function delete($param){
        try{
            $param = (int) $param['id'];
            $person = Person::delete ($param);
            $this->data = $person;
        }catch(Exception $e ){
            print $e->getMessage();
        }
    }

    public function show(){

        $search =   ['{id}', '{cep}', '{name}', '{address}', '{district}',
         '{phone}', '{mail}', '{city}', '{state}'];
         $replace = $this->data;

         $this->html = str_replace ($search, $this->data, $this->html);

         print $this->html;
         
    }
}