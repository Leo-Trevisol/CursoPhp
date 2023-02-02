<?php

require 'db/person_db.php';

if (!empty($_GET['action']) && $_GET['action'] == 'delete') {
    $id =  filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $result = person_delete($id);
}
$result = person_list();
$rows = "";
foreach ($result as $person) {
    extract($person);
    $row = file_get_contents('html/row.html');
    $row = str_replace(
        ['{id}', '{name}', '{district}', '{phone}', '{address}'],
        [$id, $name, $district, $phone, $address],
        $row
    );
    $rows .= $row;
};

$list = file_get_contents('html/list.html');
$list = str_replace('{rows}', $rows, $list);

echo $list;
