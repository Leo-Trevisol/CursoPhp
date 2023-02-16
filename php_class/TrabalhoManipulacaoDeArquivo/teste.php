<?php


 
if (isset($_POST['name']) &&isset($_POST['number']) ) {
   $name = $_POST['name'];
   $number = $_POST['number'];
 
   $arquivo = fopen('listaTelefonica.txt', 'w');
   fwrite($arquivo, $name . PHP_EOL . $number);
   fclose($arquivo);
}
