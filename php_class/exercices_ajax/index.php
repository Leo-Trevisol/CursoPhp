<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor monetario</title>
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
                <option value="" disabled selected> SELECIONE O EXERCICIO </option>
                <option value="form1"> Exercicio11 </option>
                <option value="form2"> Exercicio12 </option>
                <option value="form3"> Exercicio13 </option>
                <option value="form4"> Exercicio14 </option>
                <option value="form5"> Exercicio15 </option>
                <option value="form6"> Exercicio16 </option>
                <option value="form7"> Exercicio17 </option>
            </select>
        </form>
        <form action='' id='form1' method='post' class='auto_save ds_none' enctype="multipar/form-data" novalidate>

            <input type="hidden" name="callback" value="Exercicies">
            <input type="hidden" name="callback_action" value="conversion1">

            <fieldset>
                <legend><i class='icon icon-coin-dolar'></i>11. Uma fábrica controla o tempo de trabalho sem acidentes pela quantidade de dias. Faça um algoritmo para converter este tempo em anos, meses e dias. Assuma que cada mês possui sempre 30 dias.</legend>
                <div class='trigger_modal'></div>
                <div class='flex-box'>
                    <label for='diasSemAcidente'>
                        <span class='icon icon-coin-dollar'> DIAS SEM ACIDENTE:</span>
                        <input type='number' name='diasSemAcidente' id='diasSemAcidente' step='0.01' min='1' value='' required>
                    </label>


                    <label for='anos'>
                        <span> Anos:</span>
                        <input type='text' name='anos' id='anos' value='' disabled>
                    </label>
                    <label for='meses'>
                        <span> Meses: </span>
                        <input type='text' name='meses' id='meses' value='' disabled>
                    </label>
                    <label for='dias'>
                        <span> Dias: </span>
                        <input type='text' name='dias' id='dias' value='' disabled>
                    </label>
                </div>
                <div class="flex-box">
                    <button class="btn btn-green btn-rounded" value="1" type="submit">
                        <img class="ds_none form_load" src="images/load_w.gif" alt="enviando formulario!">Calcular
                    </button>
                </div>
            </fieldset>
        </form>
        <form action='' id='form2' method='post' class='auto_save ds_none' enctype="multipar/form-data" novalidate>

            <input type="hidden" name="callback" value="Exercicies">
            <input type="hidden" name="callback_action" value="conversion2">

            <fieldset>
                <legend><i class='icon icon-coin-dolar'></i>12. Faça um algoritmo para ler o salário de um funcionário e aumentá-Io em 15%. Após o aumento, desconte 8% de impostos. Imprima o salário inicial, o salário com o aumento e o salário final.</legend>
                <div class='trigger_modal'></div>
                <div class='flex-box'>
                    <label for='valorSalario'>
                        <span class='icon icon-coin-dollar'> Salario do funcionario:</span>
                        <input type='number' name='valorSalario' id='diasSemAcidene' step='0.01' min='1' value='' required>
                    </label>

                    <label for='aumentoSalario'>
                        <span class='icon icon-coin-dollar'> Salario com aumento de 15%:</span>
                        <input type='number' name='aumentoSalario' id='aumentoSalario' step='0.01' min='1' value='' disabled>
                    </label>
                    <label for='descontoSalario'>
                        <span class='icon icon-coin-dollar'> Salario com desconto de 8%:</span>
                        <input type='number' name='descontoSalario' id='descontoSalario' step='0.01' min='1' value='' disabled>
                    </label>

                </div>
                <div class="flex-box">
                    <button class="btn btn-green btn-rounded" value="1" type="submit">
                        <img class="ds_none form_load" src="images/load_w.gif" alt="enviando formulario!">Calcular
                    </button>
                </div>
            </fieldset>
        </form>
        <form action='' id='form3' method='post' class='auto_save ds_none' enctype="multipar/form-data" novalidate>

            <input type="hidden" name="callback" value="Exercicies">
            <input type="hidden" name="callback_action" value="conversion3">

            <fieldset>
                <legend><i class='icon icon-coin-dolar'></i>13. Ler um número inteiro (assuma até três dígitos) e imprimir a saída da seguinte forma: CENTENA = x DEZENA = x UNIDADE = x</legend>
                <div class='trigger_modal'></div>
                <div class='flex-box'>
                    <label for='numero'>
                        <span class='icon icon-coin-dollar'> Digite um numero de 3 digitos:</span>
                        <input type='number' name='numero' id='numero' step='0.01' min='1' value='' required>
                    </label>

                    <label for='centena'>
                        <span class='icon icon-coin-dollar'> Centena:</span>
                        <input type='number' name='centena' id='centena' step='0.01' min='1' value='' disabled>
                    </label>
                    <label for='dezena'>
                        <span class='icon icon-coin-dollar'>Dezena:</span>
                        <input type='number' name='dezena' id='dezena' step='0.01' min='1' value='' disabled>
                    </label>
                    <label for='unidade'>
                        <span class='icon icon-coin-dollar'>Unidade:</span>
                        <input type='number' name='unidade' id='unidade' step='0.01' min='1' value='' disabled>
                    </label>

                </div>
                <div class="flex-box">
                    <button class="btn btn-green btn-rounded" value="1" type="submit">
                        <img class="ds_none form_load" src="images/load_w.gif" alt="enviando formulario!">Calcular
                    </button>
                </div>
            </fieldset>
        </form>

        <form action='' id='form4' method='post' class='auto_save ds_none' enctype="multipar/form-data" novalidate>

            <input type="hidden" name="callback" value="Exercicies">
            <input type="hidden" name="callback_action" value="conversion4">

            <fieldset>
                <legend><i class='icon icon-coin-dolar'></i>14. Calcule a área de uma pizza que possui um raio R (pi=3.14).</legend>
                <div class='trigger_modal'></div>
                <div class='flex-box'>
                    <label for='area'>
                        <span class='icon icon-coin-dollar'>Digite o raio da pizza:</span>
                        <input type='number' name='raio' id='raio' step='0.01' min='1' value='' required>
                    </label>

                    <label for='result1'>
                        <span class='icon icon-coin-dollar'> Valor da area:</span>
                        <input type='number' name='area' id='area' step='0.01' min='1' value='' disabled>
                    </label>


                </div>
                <div class="flex-box">
                    <button class="btn btn-green btn-rounded" value="1" type="submit">
                        <img class="ds_none form_load" src="images/load_w.gif" alt="enviando formulario!">Calcular
                    </button>
                </div>
            </fieldset>
        </form>
        <form action='' id='form5' method='post' class='auto_save ds_none' enctype="multipar/form-data" novalidate>

            <input type="hidden" name="callback" value="Exercicies">
            <input type="hidden" name="callback_action" value="conversion5">

            <fieldset>
                <legend><i class='icon icon-coin-dolar'></i>15. Três amigos, Carlos, André e Felipe. decidiram rachar igualmente a conta de um bar. Faça um algoritmo para ler o valor total da conta e imprimir quanto cada um deve pagar, mas faça com que
                    Carlos e André não paguem centavos. Ex: uma conta de R$101,53 resulta em R$33,00 para
                    Carlos, R$33,00 para André e R$35,53 para Felipe.</legend>
                <div class='trigger_modal'></div>
                <div class='flex-box'>
                    <label for='valorConta'>
                        <span class='icon icon-coin-dollar'>Digite o valor da conta:</span>
                        <input type='number' name='valorConta' id='valorConta' step='0.01' min='1' value='' required>
                    </label>

                    <label for='contaCarlos'>
                        <span class='icon icon-coin-dollar'>Carlos vai pagar:</span>
                        <input type='number' name='contaCarlos' id='contaCarlos' step='0.01' min='1' value='' disabled>
                    </label>
                    <label for='contaAndre'>
                        <span class='icon icon-coin-dollar'>Andre vai pagar:</span>
                        <input type='number' name='contaAndre' id='contaAndre' step='0.01' min='1' value='' disabled>
                    </label>
                    <label for='contaFelipe'>
                        <span class='icon icon-coin-dollar'>Felipe vai pagar:</span>
                        <input type='number' name='contaFelipe' id='contaFelipe' step='0.01' min='1' value='' disabled>
                    </label>

                </div>
                <div class="flex-box">
                    <button class="btn btn-green btn-rounded" value="1" type="submit">
                        <img class="ds_none form_load" src="images/load_w.gif" alt="enviando formulario!">Calcular
                    </button>
                </div>
            </fieldset>
        </form>
        <form action='' id='form6' method='post' class='auto_save ds_none' enctype="multipar/form-data" novalidate>

            <input type="hidden" name="callback" value="Exercicies">
            <input type="hidden" name="callback_action" value="conversion6">

            <fieldset>
                <legend><i class='icon icon-coin-dolar'></i>16. A lanchonete Gostosura vende apenas um tipo de sanduíche, cujo recheio inclui duas fatias de queijo, uma fatia de presunto e uma rodela de hambúrguer. Sabendo que cada fatia de queijo ou
                    presunto pesa 50 gramas, e que a rodela de hambúrguer pesa 100 gramas, faça um algoritmo em
                    que o dono forneça a quantidade de sanduíches a fazer, e a máquina informe as quantidades (em
                    quilos) de queijo, presunto e carne necessários para compra.</legend>
                <div class='trigger_modal'></div>
                <div class='flex-box'>
                    <label for='qtdHamburguer'>
                        <span class='icon icon-coin-dollar'>Digite a quantidade de hamburgueres:</span>
                        <input type='number' name='qtdHamburguer' id='qtdHamburguer' step='0.01' min='1' value='' required>
                    </label>

                    <label for='pesoQueijo'>
                        <span class='icon icon-coin-dollar'>Peso queijo (Kgs):</span>
                        <input type='number' name='pesoQueijo' id='pesoQueijo' step='0.01' min='1' value='' required>
                    </label>
                    <label for='pesoPresunto'>
                        <span class='icon icon-coin-dollar'>Peso presunto (Kgs):</span>
                        <input type='number' name='pesoPresunto' id='pesoPresunto' step='0.01' min='1' value='' required>
                    </label>
                    <label for='pesoCarne'>
                        <span class='icon icon-coin-dollar'>Peso carne (Kgs):</span>
                        <input type='number' name='pesoCarne' id='pesoCarne' step='0.01' min='1' value='' required>
                    </label>

                </div>
                <div class="flex-box">
                    <button class="btn btn-green btn-rounded" value="1" type="submit">
                        <img class="ds_none form_load" src="images/load_w.gif" alt="enviando formulario!">Calcular
                    </button>
                </div>
            </fieldset>
        </form>
        <form action='' id='form7' method='post' class='auto_save ds_none' enctype="multipar/form-data" novalidate>

            <input type="hidden" name="callback" value="Exercicies">
            <input type="hidden" name="callback_action" value="conversion7">

            <fieldset>
                <legend><i class='icon icon-coin-dolar'></i>17. Alguns países medem temperaturas em graus Celsius, e outros em graus Fahrenheit. Faça um algoritmo para ler uma temperatura Celsius e imprimi-Ia em Fahrenheit (pesquise como fazer este tipo de conversão).</legend>
                <div class='trigger_modal'></div>
                <div class='flex-box'>
                    <label for='tempCelsius'>
                        <span class='icon icon-coin-dollar'>Digite a temperatura em Celsius:</span>
                        <input type='number' name='tempCelsius' id='tempCelsius' step='0.01' min='1' value='' required>
                    </label>

                    <label for='tempFh'>
                        <span class='icon icon-coin-dollar'>Temperatura em Fahrenheit:</span>
                        <input type='number' name='tempFh' id='tempFh' step='0.01' min='1' value='' required>
                    </label>
                </div>
                <div class="flex-box">
                    <button class="btn btn-green btn-rounded" value="1" type="submit">
                        <img class="ds_none form_load" src="images/load_w.gif" alt="enviando formulario!">Calcular
                    </button>
                </div>
            </fieldset>
        </form>
    </section>

</body>

</html>
