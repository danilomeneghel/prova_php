$(document).ready(function () {
    $('#TarefaNovo').on('click', function (e) {
        e.preventDefault();
        $('#modal1').openModal();
        $('#modal1 form #TarefaId').val('');
    });

    $('#TarefaGravar').on('click', function (e) {
        e.preventDefault();
        id = $('#modal1 form #TarefaId').val();
        if ($.trim(id) == '') {
            adicionarTarefa();
        }
        else {
            gravarEdicaoTarefa(id);
        }
    });

    carregaTarefas();

    $("#response").hide();
    $(function () {
        $('#list ol').sortable({opacity: 0.8, cursor: 'move', update: function () {
                var order = $(this).sortable("serialize") + '&update=update';
                $.post($URLSISTEMA + "tarefas/updatePriority/", order, function (theResponse) {
                    $("#response").html(theResponse);
                    $("#response").slideDown('slow');
                    slideout();
                });
            }
        });
    });
});

function slideout() {
    setTimeout(function () {
        $("#response").slideUp("slow", function () {
        });
    }, 2000);
}

function carregaTarefas() {
    $.getJSON($URLSISTEMA + 'tarefas/listaTarefas', function (data, txtStatus) {
        if (data.resultado.length > 0) {
            $('ol#lista-tarefas').html('');
            $.each(data.resultado, function (i, registro) {
                divsec = '<div class="secondary-content"><a href="javascript:editarTarefa(' + registro.id + ')"><i class="material-icons">edit</i></a>';
                divsec += '<a href="javascript:excluirTarefa(' + registro.id + ')" title="Exluir tarefa"><i class="material-icons">done</i></a></div>'
                $('<li/>', {"class": 'collection-item', "id": 'reg_' + registro.id})
                        .append('<span class="titulo">' + registro.titulo + '</span>')
                        .append('<span class="descricao">' + registro.descricao + '</span>')
                        .append(divsec)
                        .append('<input type="hidden" name="id" value="' + registro.id + '">')
                        .appendTo('ol#lista-tarefas');
            })
        }
        Materialize.showStaggeredList('ol#lista-tarefas');
    });
}

function excluirTarefa(id) {
    if (confirm('Deseja mesmo excluir este registro?')) {
        var cfg = {
            'method': 'GET',
            'url': $URLSISTEMA + 'tarefas/delete/' + id,
            'dataType': 'json',
            'success': function (data) {
                if (data.sucesso) {
                    Materialize.toast(data.mensagem, 4000)
                    carregaTarefas();
                }
            },
            'error': function () {
                //location.reload();
            }
        }
        $.ajax(cfg);
    }
}

function adicionarTarefa() {
    var cfg = {
        'method': 'POST',
        'url': $URLSISTEMA + 'tarefas/add',
        'data': {
            'data[Tarefa][titulo]': $('#TarefaTitulo').val(),
            'data[Tarefa][descricao]': $('#TarefaDescricao').val()
        },
        'dataType': 'json',
        'success': function (data) {
            if (data.sucesso) {
                Materialize.toast(data.mensagem, 4000)
                carregaTarefas();
            }
            carregaTarefas();
        },
        'error': function () {

        },
        'complete': function () {
            $('#modal1').closeModal();
        }
    }
    $.ajax(cfg);
}

function editarTarefa(id) {
    $('#modal1').openModal({complete: limpaForm()});
    $('#modal1 form #TarefaId').val(id);
    $('#modal1 form #TarefaTitulo').val($('#reg_' + id).find('.titulo').text()).addClass('active').focus();
    $('#modal1 form #TarefaDescricao').val($('#reg_' + id).find('.descricao').text()).addClass('active').focus();
}

function gravarEdicaoTarefa(id) {
    var cfg = {
        'method': 'POST',
        'url': $URLSISTEMA + 'tarefas/edit/' + id,
        'data': {
            'data[Tarefa][id]': $('#TarefaId').val(),
            'data[Tarefa][titulo]': $('#TarefaTitulo').val(),
            'data[Tarefa][descricao]': $('#TarefaDescricao').val()
        },
        'dataType': 'json',
        'success': function (data) {
            if (data.sucesso) {
                Materialize.toast(data.mensagem, 4000)
                carregaTarefas();
            }
        },
        'error': function () {

        },
        'complete': function () {
            $('#modal1').closeModal();
            limpaForm();
        }
    }
    $.ajax(cfg);
}

function limpaForm() {
    $('#modal1 form #TarefaId').val('');
    $('#modal1 form #TarefaTitulo').val('');
    $('#modal1 form #TarefaDescricao').val('');
}
