<?php
    
    require_once __DIR__ . '/classes/Person.php';
    //AÇÃO DE DELETAR
    try {
        if (!empty($_GET['action']) && $_GET['action'] == 'delete') {
            $id = (int)$_GET['id'];
            Person::delete($id);
        }
        //AÇÃOD E LISTAR TODAS AS PESSOAS
        $persons = Person::all();
    }
    catch (Exception $e) {
        print $e->getMessage();
    }
    
    $rows = null;
    
    if ($persons) {
        //var_dump($persons);
        foreach ($persons as $person) {
            $row = file_get_contents(__DIR__.'/html/row.html');
            
            $row = str_replace(['{id}', '{name}', '{address}', '{district}', '{phone}', '{mail}'], [$person['id'], $person['name'], $person['address'], $person['district'], $person['phone'], $person['mail']], $row);
            $rows .= $row;
            
           /* $row = str_replace('{id}', $person['id'], $row);
            $row = str_replace('{name}', $person['name'], $row);
            $row = str_replace('{address}', $person['address'], $row);
            $row = str_replace('{district}', $person['district'], $row);
            $row = str_replace('{phone}', $person['phone'], $row);
            $rows .= $row;*/
        }
    }
    $list = file_get_contents(__DIR__.'/html/list.html');
    $list = str_replace('{rows}', $rows, $list);
    print $list;
