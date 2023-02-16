<?php

$getcontents = __DIR__ . "/listaTelefonica.txt";

// if(file_exists($getcontents) && is_file($getcontents)){
//       echo file_get_contents($getcontents);
// }else{

//     $data = "<article><h1> leozin bacana (54) 98408-1674 </h1> </article>";
//  file_put_contents($getcontents, $data);

// }

$read = fopen($getcontents, 'r');

while(!feof($read)){
    echo "<article> <h2> " . fgets($read) . " </h2> </article>";
}

?>

