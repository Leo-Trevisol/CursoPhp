<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor monetario</title>
    <link rel="base" href="http://localhost/php_class/conversor">
    <link rel='preconnect' href='http://fonts.googleapis.com'>
    <link rel='preconnect' href='http://fonts.gstatic.com' crossorigin>
    <link href='http://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href="_css/icomoon/demo-files/demo.css">
    <link rel='stylesheet' href="_css/style.css">


    <script src="_js/jquery.js"></script>
    <script src="_js/jquery.form.js"></script>
    <script src="_js/script.js"></script>



</head>

<body>

    <section class="container">
        <form action="" style="margin-bottom:50px;">
            <select name="seletor" id="seletor">
                <option value="" disabled selected> SELECIONE O CONVERSOR </option>
                <option value="dolar"> Cotação do dolar </option>
                <option value="medidas"> Converor metrico </option>
            </select>
        </form>
        <form action='' id='dolar' method='post' class='auto_save ds_none' enctype="multipar/form-data" novalidate>

        <input type="hidden" name="callback" value="Conversor">
            <input type="hidden" name="callback_action" value="conversion">

            <fieldset>
                <legend><i class='icon icon-coin-dolar'></i>CONVERSOR MONETARIO</legend>

                <div class='trigger_modal'></div>
                <div class='flex-box'>
                    <label for='usd'>
                        <span class='icon icon-coin-dollar'> VALOR EM USD:</span>
                        <input type='number' name='usd' id='usd' step='0.01' min='1' value='' required>
                    </label>

                    <label for='city'>
                        <span> CIDADE DO CAMBIO </span>
                        <select name='city' id='city' required>
                            <option value='' disabled selected>Selecione a cidade</option>
                            <option value='bh'>Belo Horizonte</option>
                            <option value='rj'>Rio de Janeiro</option>
                            <option value='sp'>São Paulo</option>
                        </select>
                    </label>

                    <label for='result'>
                        <span> A cotação em <mark id='ct'></mark> é <b> R$</b> </span>
                        <input type='text' name='result' placeholder='VALOR EM BRL' id='result' value=''>
                    </label>
                </div>
                <div class="flex-box">
                    <button class="btn btn-green btn-rounded" value="1" type="submit">
                        <img class="ds_nome form_load" src="images/load_w.gif" alt="enviando formulario!">Converter
                    </button>
                </div>
            </fieldset>
        </form>
    </section>

</body>

</html>
