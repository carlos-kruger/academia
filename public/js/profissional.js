$(document).ready(function() {
    setEvents();
    buscaDados();
})

function setEvents() {
    $('#btn_incluir').click(() => {
        clearInputs();
        openModal('modal_incluir_profissional');
        $('#modal_incluir_profissional_label').text('Incluir profissional');
    });

    $('#btn_confirmar').click(() => {
        let oCliente = {
            id: getValue('codigo'),
            nome: getValue('nome'),
            email: getValue('email'),
            celular: getValue('celular'),
            nascimento: getValue('nascimento')
        }

        if(getValue('codigo') != '') {
            updateDados(oCliente);
        }
        else {
            saveDados(oCliente);
        }
    });

    $('#btn_fechar').click(() => {
        closeModal('modal_incluir_profissional');
    });
}

function buscaDados() {
    loadAjax({
        rota: 'profissionais',
        success: (result) => {
            loadDataGrid(result);
        }
    })
}

function loadDataGrid(result) {
    let oTable = $('#grid_profissionais tbody');
    oTable.empty();

    result.forEach(oDado => {
        oTable.append(
            $('<tr>')).append(
                $('<td>', {
                    html: oDado.id
                }),
                $('<td>', {
                    html: oDado.nome
                }),
                $('<td>', {
                    html: oDado.email
                }),
                $('<td>', {
                    html: oDado.celular
                }),
                $('<td>', {
                    html: oDado.nome
                }),
                $('<td>', {
                    html: oDado.nome
                }),
                $('<td>').append(
                    $('<i>', {
                        class: 'fas fa-pencil-alt',
                        title: 'Alterar',
                        css: {
                            cursor: 'pointer'
                        },
                        click: () => {
                            openModalAlteracao(oDado)
                        }
                    })
                ))
    });
}

function saveDados(oCliente) {
    loadAjax({
        method: 'POST',
        rota: 'profissionals',
        data: oCliente,
        success: () => {
            clearInputs();
            closeModal('modal_incluir_profissional');
            buscaDados();
        }
    })
}

function updateDados(oCliente) {
    loadAjax({
        method: 'PUT',
        rota: `profissionais/${oCliente.id}`,
        data: oCliente,
        success: () => {
            closeModal('modal_incluir_profissional');
            buscaDados();
            clearInputs();
        }
    })
}

function openModalAlteracao(oDados) {
    $('#modal_incluir_profissional_label').text('Alterar profissional');
    openModal('modal_incluir_profissional');
    setDadosModal(oDados);
}

function setDadosModal(oDados) {
    $('#codigo').val(oDados.id);
    $('#nome').val(oDados.nome);
    $('#email').val(oDados.email);
    $('#celular').val(oDados.celular);
}

function clearInputs() {
    $('#codigo, #nome, #email, #celular, #senha, #confirmar_senha').val('');
}