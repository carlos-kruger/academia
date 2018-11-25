$(document).ready(function() {
    setEvents();
    buscaDados();  
})

function setEvents() {
    $('#btn_incluir').click(() => {
        let formAluno = document.getElementById('form_avaliacao');
        formAluno.classList.remove('was-validated'); 
        clearInputs();
        openModal('modal_incluir_avaliacao');
        $('#modal_incluir_avaliacao_label').text('Incluir avaliação');
    });

    $('#btn_confirmar').click((event) => {
        let formAvaliacao = document.getElementById('form_avaliacao');
        if (formAvaliacao.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else {
            let oAvaliacao = {
                codigo_aluno: getValue('aluno'),
                codigo_instrutor: __codigoUsuarioLogado,
                data: getValue('data'),
                altura: getValue('altura'),
                peso: getValue('peso')
            }
    
            if(getValue('codigo') != '') {
                updateDados(oAvaliacao, getValue('codigo'));
            }
            else {
                saveDados(oAvaliacao);
            }
        }

        formAvaliacao.classList.add('was-validated');  
    });

    $('#btn_fechar').click(() => {
        closeModal('modal_incluir_avaliacao');
    });

    $('#aluno').blur(function() {
        buscaCliente($(this).val().trim());
    });
}

function buscaDados() {
    loadAjax({
        rota: 'avaliacoes',
        success: (result) => {
            loadDataGrid(result);
        }
    })
}

function saveDados(oAvaliacao) {
    loadAjax({
        method: 'POST',
        rota: 'avaliacoes',
        data: oAvaliacao,
        success: () => {
            clearInputs();
            closeModal('modal_incluir_avaliacao');
            buscaDados();
            message('Avaliação incluida com sucesso', 'success');
        }
    })
}

function updateDados(oAvaliacao, id) {
    loadAjax({
        method: 'PUT',
        rota: `avaliacoes/${id}`,
        data: oAvaliacao,
        success: () => {
            closeModal('modal_incluir_avaliacao');
            buscaDados();
            clearInputs();
            message('Avaliação alterada com sucesso', 'success');
        }
    })
}

function excluirDados(id) {
    if(confirm('Confirma excluir este registro?')) {
        loadAjax({
            method: 'DELETE',
            rota: `avaliacoes/${id}`,
            success: () => {
                buscaDados();
                message('Avaliação excluída com sucesso', 'success');
            }            
        })
    }
}

function loadDataGrid(result) {
    let oTable = $('#grid_avaliacoes tbody');
    oTable.empty();

    result.forEach(oDado => {
        oTable.append(
            $('<tr>')).append(
                $('<td>', {
                    html: oDado.nome_aluno
                }),
                $('<td>', {
                    html: oDado.nome_instrutor
                }),
                $('<td>', {
                    html: oDado.created_at
                }),
                $('<td>', {
                    html: oDado.altura
                }),
                $('<td>', {
                    html: oDado.peso
                }),
                $('<td>').append(
                    criaIcone({
                        class: 'pencil-alt',
                        title: 'Alterar',
                        click: () => {
                            openModalAlteracao(oDado)
                        }
                    }),
                    criaIcone({
                        class: 'trash',
                        title: 'Excluir',
                        click: () => {
                            excluirDados(oDado.id)
                        }
                    })           
                ))
    });
}

function openModalAlteracao(oDados) {
    $('#modal_incluir_avaliacao_label').text('Alterar avaliação');
    openModal('modal_incluir_avaliacao');
    setDadosModal(oDados);
}

function setDadosModal(oDados) {
    $('#codigo').val(oDados.id);
    $('#aluno').val(oDados.codigo_aluno);
    $('#aluno_nome').val(oDados.nome_aluno);
    $('#altura').val(oDados.altura);
    $('#peso').val(oDados.peso);
}

function clearInputs() {
    $('#codigo, #aluno, #aluno_nome, #altura, #peso').val('');
}