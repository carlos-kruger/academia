$(document).ready(function() {
    setEvents();
    buscaDados();  
})

function setEvents() {
    $('#btn_incluir').click(() => {
        let formAluno = document.getElementById('form_aluno');
        formAluno.classList.remove('was-validated'); 
        clearInputs();
        openModal('modal_incluir_aluno');
        $('#modal_incluir_aluno_label').text('Incluir aluno');
    });

    $('#btn_confirmar').click((event) => {
        let formAluno = document.getElementById('form_aluno');
        if (formAluno.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else {
            let oCliente = {
                nome: getValue('nome'),
                email: getValue('email'),
                celular: getValue('celular'),
                nascimento: getValue('nascimento'),
                sexo: parseInt(getValue('sexo'))
            }
    
            if(getValue('codigo') != '') {
                updateDados(oCliente, getValue('codigo'));
            }
            else {
                saveDados(oCliente);
            }
        }

        formAluno.classList.add('was-validated');  
    });

    $('#btn_fechar').click(() => {
        closeModal('modal_incluir_aluno');
    });
}

function buscaDados() {
    loadAjax({
        rota: 'cliente',
        success: (result) => {
            loadDataGrid(result);
        }
    })
}

function loadDataGrid(result) {
    let oTable = $('#grid_alunos tbody');
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
                    html: oDado.nascimento
                }),
                $('<td>', {
                    html: oDado.created_at
                }),
                $('<td>', {
                    html: oDado.updated_at
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
                    }),
                    $('<i>', {
                        class: 'fas fa-pencil-alt',
                        title: 'Avaliação',
                        css: {
                            cursor: 'pointer'
                        },
                        click: () => {
                            openModalAvaliacao()
                        }
                    })                    
                ))
    });
}

function saveDados(oCliente) {
    loadAjax({
        method: 'POST',
        rota: 'cliente',
        data: oCliente,
        success: () => {
            clearInputs();
            closeModal('modal_incluir_aluno');
            buscaDados();
            message('Aluno incluido com sucesso', 'success');
        }
    })
}

function updateDados(oCliente, id) {
    loadAjax({
        method: 'PUT',
        rota: `cliente/${id}`,
        data: oCliente,
        success: () => {
            closeModal('modal_incluir_aluno');
            buscaDados();
            clearInputs();
            message('Aluno alterado com sucesso', 'success');
        }
    })
}

function openModalAlteracao(oDados) {
    $('#modal_incluir_aluno_label').text('Alterar aluno');
    openModal('modal_incluir_aluno');
    setDadosModal(oDados);
}

function openModalAvaliacao() {
    openModal('modal_incluir_avaliacao');
}

function setDadosModal(oDados) {
    $('#codigo').val(oDados.id);
    $('#nome').val(oDados.nome);
    $('#email').val(oDados.email);
    $('#celular').val(oDados.celular);
    $('#nascimento').val(oDados.nascimento);
    $('#sexo').val(oDados.sexo);
}

function clearInputs() {
    $('#codigo, #nome, #email, #celular, #nascimento').val('');
    $('#sexo').val('1');
}