<?php



$getcontents = __DIR__ . "/listaTelefonica.txt";



if(file_exists($getcontents) && is_file($getcontents)){
      echo file_get_contents($getcontents);
}else{

    $data = "<article><h1>$name</h1> . <h2> $number </h2> </article>";
 file_put_contents($getcontents, $data);

}

?>

