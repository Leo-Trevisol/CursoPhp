$(function () {
    const BASE = $(location).attr('href');

    //AUTOSAVE ACTION
    $('html').on('change', 'form.auto_save', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var form = $(this);
        var callback = form.find('input[name="callback"]').val();
        var callback_action = form.find('input[name="callback_action"]').val();

        /* if (typeof tinyMCE !== 'undefined') {
             tinyMCE.triggerSave();
         }*/
        form.ajaxSubmit({
            url: BASE + '/_ajax/' + callback + '.ajax.php',
            data: { callback_action: callback_action },
            dataType: 'json',

            uploadProgress: function (evento, posicao, total, completo) {
                var porcento = completo + '%';
                $('.workcontrol_upload_progrees').text(porcento);
                if (completo <= '80') {
                    $('.workcontrol_upload').fadeIn().css('display', 'flex');
                }
                if (completo >= '99') {
                    $('.workcontrol_upload').fadeOut('slow', function () {
                        $('.workcontrol_upload_progrees').text('0%');
                    });
                }
                //PREVENT TO RESUBMIT IMAGES GALLERY
                form.find('input[name="image[]"]').replaceWith($('input[name="image[]"]').clone());
            },

            success: function (data) {
                //EXIBE CALLBACKS
                //COLOCA O FOCUS NO CAMPO NÃO PREENCHIDO DO FORM
                if (data.field) {
                    $("#" + data.field + "").addClass('alert').focus();
                }
                if (data.cotacao) {
                    $("#result").val(data.cotacao);
                }

                //CLEAR INPUT FILE
                if (!data.error) {
                    form.find('input[type="file"]').val('');
                }
            }
        });
    });

    //Coloca todos os formulários em AJAX mode e inicia LOAD ao submeter!
    $('html').on('submit', 'form:not(.ajax_off)', function () {
        var form = $(this);
        var callback = form.find('input[name="callback"]').val();
        var callback_action = form.find('input[name="callback_action"]').val();
        if (typeof tinyMCE !== 'undefined') {
            tinyMCE.triggerSave();
        }
        form.ajaxSubmit({
            url: BASE + '/_ajax/' + callback + '.ajax.php',
            data: { callback_action: callback_action },
            dataType: 'json',

            beforeSubmit: function () {
                form.find('.form_load').fadeIn('fast');
                $('.trigger_ajax').fadeOut('fast');
            },

            uploadProgress: function (evento, posicao, total, completo) {
                var porcento = completo + '%';
                $('.workcontrol_upload_progrees').text(porcento);
                if (completo <= '80') {
                    $('.workcontrol_upload').fadeIn().css('display', 'flex');
                }
                if (completo >= '99') {
                    $('.workcontrol_upload').fadeOut('slow', function () {
                        $('.workcontrol_upload_progrees').text('0%');
                    });
                }
                //PREVENT TO RESUBMIT IMAGES GALLERY
                form.find('input[name="image[]"]').replaceWith($('input[name="image[]"]').clone());
            },
            success: function (data) {
                //REMOVE LOAD
                form.find('.form_load').fadeOut('slow', function () {

                    //EXIBE CALLBACKS
                    if (data.trigger) {
                        Trigger(data.trigger);
                    }

                    //COLOCA O FOCUS NO CAMPO NÃO PREENCHIDO DO FORM
                    if (data.field) {
                        $("#" + data.field + "").addClass('alert').focus();
                    } else {
                        $("#" + data.field + "").removeClass('alert');
                    }


                    if (data.cotacao) {
                        $("#result").val(data.cotacao);
                    }

                    if (data.result) {
                        $("#un").text(data.un);
                        // $("#result_convertion").val(data.result);
                        $("[name='result_convertion']").val(data.result);

                    }

                    if (data.ex11) {
                        $("#anos").val(data.ex11);
                    }

                    if (data.ex111) {
                        $("#meses").val(data.ex11);
                    }

                    if (data.ex12) {
                        $("#aumentoSalario").val(data.ex12);
                    }

                    if (data.ex121) {
                        $("#descontoSalario").val(data.ex121);
                    }

                    if (data.ex13) {
                        $("#centena").val(data.ex13);
                    }

                    if (data.ex131) {
                        $("#dezena").val(data.ex131);
                    }

                    if (data.ex132) {
                        $("#unidade").val(data.ex132);
                    }

                    if (data.ex14) {
                        $("#area").val(data.ex14);
                    }

                    if (data.ex15) {
                        $("#contaCarlos").val(data.ex15);
                    }

                    if (data.ex151) {
                        $("#contaAndre").val(data.ex151);
                    }

                    if (data.ex152) {
                        $("#contaFelipe").val(data.ex152);
                    }
                    //REDIRECIONA
                    if (data.redirect) {
                        $('.workcontrol_upload p').html("Atualizando dados, aguarde!");
                        $('.workcontrol_upload').fadeIn().css('display', 'flex');
                        window.setTimeout(function () {
                            window.location.href = data.redirect;
                            if (window.location.hash) {
                                window.location.reload();
                            }
                        }, 1500);
                    }

                    //INTERAGE COM TINYMCE
                    if (data.tinyMCE) {
                        tinyMCE.activeEditor.insertContent(data.tinyMCE);
                        $('.workcontrol_imageupload').fadeOut('slow', function () {
                            $('.workcontrol_imageupload .image_default').attr('src', '../tim.php?src=admin/_img/no_image.jpg&w=500&h=300');
                        });
                    }
                    //GALLETY UPDATE HTML
                    if (data.gallery) {
                        form.find('.gallery').fadeTo('300', '0.5', function () {
                            $(this).html($(this).html() + data.gallery).fadeTo('300', '1');
                        });
                    }
                    //DATA CONTENT IN j_content
                    if (data.content) {
                        if (typeof (data.content) === 'string') {
                            $('.j_content').fadeTo('300', '0.5', function () {
                                $(this).html(data.content).fadeTo('300', '1');
                            });
                        } else if (typeof (data.content) === 'object') {
                            $.each(data.content, function (key, value) {
                                $(key).fadeTo('300', '0.5', function () {
                                    $(this).html(value).fadeTo('300', '1');
                                });
                            });
                        }
                    }
                    //DATA DINAMIC CONTENT
                    if (data.divcontent) {
                        if (typeof (data.divcontent) === 'string') {
                            $(data.divcontent[0]).html(data.divcontent[1]);
                        } else if (typeof (data.divcontent) === 'object') {
                            $.each(data.divcontent, function (key, value) {
                                $(key).html(value);
                            });
                        }
                    }
                    //DATA DINAMIC FADEOUT
                    if (data.divremove) {
                        if (typeof (data.divremove) === 'string') {
                            $(data.divremove).fadeOut();
                        } else if (typeof (data.divremove) === 'object') {
                            $.each(data.divremove, function (key, value) {
                                $(value).fadeOut();
                            });
                        }
                    }
                    //DATA CLICK
                    if (data.forceclick) {
                        if (typeof (data.forceclick) === 'string') {
                            setTimeout(function () {
                                $(data.forceclick).click();
                            }, 250);
                        } else if (typeof (data.forceclick) === 'object') {
                            $.each(data.forceclick, function (key, value) {
                                setTimeout(function () {
                                    $(value).click();
                                }, 250);
                            });
                        }
                    }
                    //DATA DOWNLOAD IN j_downloa
                    if (data.download) {
                        $('.j_download').fadeTo('300', '0.5', function () {
                            $(this).html(data.download).fadeTo('300', '1');
                        });
                    }
                    //DATA HREF VIEW
                    if (data.view) {
                        $('.wc_view').attr('href', data.view);
                    }
                    //DATA REORDER
                    if (data.reorder) {
                        $('.wc_drag_active').removeClass('btn_yellow');
                        $('.wc_draganddrop').removeAttr('draggable');
                    }
                    //DATA CLEAR
                    if (data.clear) {
                        form.trigger('reset');
                        if (form.find('.label_publish')) {
                            form.find('.label_publish').removeClass('active');
                        }
                    }
                    //DATA CLEAR INPUT
                    if (data.inpuval) {
                        if (data.inpuval === 'null') {
                            $('.wc_value').val("");
                        } else {
                            $('.wc_value').val(data.inpuval);
                        }
                    }
                    //CLEAR INPUT FILE
                    if (!data.error) {
                        form.find('input[type="file"]').val('');
                    }
                    //CLEAR NFE XML
                    if (data.nfexml) {
                        $('.wc_nfe_xml').html("<a target='_blank' href='" + data.nfexml + "' title='Ver XML'>Ver XML</a>");
                    }
                    //DATA NFE PDF
                    if (data.nfepdf) {
                        $('.wc_nfe_pdf').html("<a target='_blank' href='" + data.nfepdf + "' title='Ver PDF'>Ver PDF</a>");
                    }
                    //FIX FOR HIGHLIGHT
                    setTimeout(function () {
                        if ($('*[class="brush: php;"]').length) {
                            $("head").append('<link rel="stylesheet" href="../_cdn/highlight.min.css">');
                            $.getScript('../_cdn/highlight.min.js', function () {
                                $('*[class="brush: php;"]').each(function (i, block) {
                                    hljs.highlightBlock(block);
                                });
                            });
                        }
                    }, 500);
                });
            }
        });
        return false;
    });

    $("#seletor").change(function () {
        let form = $(this).val();
        $('.auto_save').hide();
        $('#' + form + '').slideDown(500);
    });

});

//############## MODAL MESSAGE
function Trigger(Message) {
    TriggerClose();
    $('body').before("<div class='trigger_modal'>" + Message + "</div>");

    $('.trigger_ajax').fadeIn().append("<div style='background-color: rgba(0,0,0,0.3); heigth: 2px; border-radius: 4px; padding: 4px; width: 1px; position: absolute; left: 0; bottom: 0;'></div>");

    $('.trigger_ajax div:last-child').animate({
        width: '+=98%'
    }, 5000, 'swing');

    setTimeout(function () {
        $('.trigger_ajax').slideUp('fast', function () {
            $(this).remove();
        });
    }, 5000);
}

function TriggerClose() {
    $('.trigger_ajax').fadeOut('fast', function () {
        $(this).remove();
    });
}
