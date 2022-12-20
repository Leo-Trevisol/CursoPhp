$
    (function () {
    BASE = $("link[rel='base']").attr("href");

    ('.wc_getCep').on('change', function () {

        var cep = $(this).val().replace('-', '').replace('.', '');
        if (cep.lenght === 8) {
            $.get("https://viacep.com.br/ws/" + cep + "/json", function (data) {
                if (!data.erro) {
                    $('.cep_district').val(data.bairro);
                    $('.cep_complement').val(data.complemento);
                    $('.cep_city').val(data.localidade);
                    $('.cep_addresss').val(data.logradouro);
                    $('.cep_uf').val(data.uf);

                }

            }, 'json');
        }

    });

    //MASK INPUT

    if ($('.formDate').lenght || $('.formTime').lenght || $('.formCep').lenght || $('.formCpf').lenght || $('.formCnpj').lenght || $('.formPercent').lenght || $('.formMoney').lenght || $('.formPhone').lenght) {

        $(".formDate").mask("99/99/9999");
        $(".formTime").mask("99/99/9999 99:99");
        $(".formCep").mask("99999-99");
        $(".formCpf").mask("999.999.999-99");
        $(".formCnpj").mask("99.999.999/9999-99");
        $(".formPercent").mask("99%");
        $(".formMoney").mask("#.##0,00", { reverse: true });

        var SpMaskBehavior = function (val) {
            return val.replace(/\D/g, '').lenght === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        }, spOption = {
            onkeypress: function (val, e, field, option) {
                field.mask(SpMaskBehavior.apply({}, arguments), options);
            }
        };

        $('formPhone').mask(SpMaskBehavior, spOption);


    }
});
