<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Exericio 1</h1>



    <form method="post">

        <div class="flex-box justify-center align-itens-center">

            <input type="number" id="d1" placeholder="Informe a largura" name="larg" required>

            <input type="number" id="d2" placeholder="Informe a altura" name="alt" required>

        </div>

        <div class="result">


            <?php


            $calcarea = function ($width, $height) {
                return $width * $height;
            };



            if (isset($_POST['b2'])) {
                echo "<h2> A area eh " . $calcarea($_POST['larg'], $_POST['alt']) . "</h2>";
            };


            ?>


        </div>

        <div class="flex-box-action">
            <button class="red" type="reset" name="b1">Limpar</button>
            <button class="green" type="submit" name="b2">Calcular</button>

        </div>


    </form>

</body>

</html>
