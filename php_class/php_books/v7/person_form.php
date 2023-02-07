<?php
    //require_once __DIR__ . '/classes/City.php';
    require_once __DIR__ . '/classes/Person.php';
    
    if (!empty($_REQUEST['action'])) {
       
        try {
            if ($_REQUEST['action'] == 'edit') {
                $id = $_GET['id'];
                $person = Person::find($id);
                
            } elseif ($_REQUEST['action'] == 'save') {
                $person = $_POST;
                //UPDATE : ATUALIZAR
                if (!empty($_POST['id'])) {
                    $result = Person::save($person);
                    //CREATE: CADASTRA NOVA PESSOA
                } else {
                    $person['id'] = Person::find($person['id']);
                    $result = Person::save($person);
                }
                print ($result ? '<div class="trigger trigger-sucess">Registro salvo com sucesso!</div>' : '<div class="trigger trigger-error"> Problemas ao Salvar!</div>');
            }
            
        }catch (Exception $e){
            print $e->getMessage();
            
        }
        
    } else {
        $person = [
            'id' => '',
            'cep' => '',
            'name' => '',
            'address' => '',
            'district' => '',
            'phone' => '',
            'mail' => '',
            'city' => '',
            'state' => ''
        ];
    }
    $form = file_get_contents('html/form.html');
    $form = str_replace(
        ['{id}', '{name}','{cep}', '{address}', '{district}', '{phone}', '{mail}', '{city}','{state}'],
        [
            $person['id'],
            $person['name'],
            $person['cep'],
            $person['address'],
            $person['district'],
            $person['phone'],
            $person['mail'],
            $person['city'],
            $person['state']
        ],
        $form
    );
    print $form;
?>
