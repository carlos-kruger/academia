var aExercicios = [];

$(document).ready(function() {
    setEvents();
    buscaDados();  
})

function setEvents() {
    $('#btn_incluir').click(() => {
        let formTreino = document.getElementById('form_treino');
        formTreino.classList.remove('was-validated');
        let formExercicio = document.getElementById('form_exercicio');
        formExercicio.classList.remove('was-validated');        
        clearInputs();
        clearInputsExercicio();
        openModal('modal_incluir_treino');
        $('#modal_incluir_treino_label').text('Incluir treino');
        $('#aluno, #aluno_nome').prop('disabled', false);
        aExercicios = [];
        clearGridExercicios();
        $('#btn_confirmar').show();
        $('#form_exercicio').show();
    });

    $('#btn_confirmar').click((event) => {
        let form = document.getElementById('form_treino');
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else if(aExercicios.length === 0) {
            message('Nenhum exercício informado', 'warning');
        }
        else {
            let oTreino = {
                codigo_aluno: getValue('aluno'),
                codigo_instrutor: __codigoUsuarioLogado,
                exercicios: aExercicios
            }
    
            if(getValue('codigo') != '') {
                updateDados(oTreino, getValue('codigo'));
            }
            else {
                saveDados(oTreino);
            }
        }

        form.classList.add('was-validated');  
    });

    $('#btn_fechar').click(() => {
        closeModal('modal_incluir_treino');
    });

    $('#aluno').blur(function() {
        buscaCliente($(this).val().trim());
    });

    $("#btn_adicionar").click(() => {
        adicionarExercicio();
    });
}

function buscaDados() {
    loadAjax({
        rota: 'treinos',
        success: (result) => {
            loadDataGrid(result);
        }
    })
}

function saveDados(oTreino) {
    loadAjax({
        method: 'POST',
        rota: 'treinos',
        data: oTreino,
        success: () => {
            clearInputs();
            closeModal('modal_incluir_treino');
            buscaDados();
            message('Treino incluido com sucesso', 'success');
            aExercicios = [];
        }
    })
}

function updateDados(oAvaliacao, id) {
    loadAjax({
        method: 'PUT',
        rota: `treinos/${id}`,
        data: oAvaliacao,
        success: () => {
            closeModal('modal_incluir_treino');
            buscaDados();
            clearInputs();
            message('Treino alterado com sucesso', 'success');
        }
    })
}

function loadDataGrid(result) {
    let oTable = $('#grid_treinos tbody');
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
                    html: (oDado.status == 1 ? 'Ativo' : 'Inativo')
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
                            excluirDados(oDado)
                        }
                    }),                    
                    criaIcone({
                        class: 'search',
                        title: 'Visualizar',
                        click: () => {
                            openModalVisualizacao(oDado)
                        }
                    })           
                ))
    });
}

function clearInputs() {
    $('#codigo, #aluno, #aluno_nome').val('');
}

function clearInputsExercicio() {
    $('#exercicio, #series, #repeticoes').val('');
}

function adicionarExercicio() {
    let form = document.getElementById('form_exercicio');
    if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');  
    }
    else if(aExercicios.filter(oExercicio => oExercicio.exercicio === getValue('exercicio')).length > 0) {
        message('Exercício já informado', 'warning');
    }
    else {
        let oExercicio = {
            exercicio: getValue('exercicio'),
            series: getValue('series'),
            repeticoes: getValue('repeticoes')
        }
    
        aExercicios.push(oExercicio);
        clearInputsExercicio();
        loadDataGridExercicios();
        form.classList.remove('was-validated'); 
    }
}

function clearGridExercicios() {
    let oTable = $('#grid_exercicios tbody');
    oTable.empty();
}

function loadDataGridExercicios(isVisualizacao) {
    clearGridExercicios();
    let oTable = $('#grid_exercicios tbody');

    aExercicios.forEach(oDado => {
        oTable.append(
            $('<tr>')).append(
                $('<td>', {
                    html: oDado.exercicio
                }),
                $('<td>', {
                    html: oDado.series
                }),
                $('<td>', {
                    html: oDado.repeticoes
                }),
                $('<td>').append(
                    criaIcone({
                        disabled: isVisualizacao,
                        class: 'trash',
                        title: 'Excluir',
                        click: () => {
                            excluirExercicio(oDado)
                        }
                    })                               
                ))
    });
}

function excluirExercicio(oDado) {
    if(confirm('Confirma remover este exercício?')) {
        aExercicios = aExercicios.filter(oExercicio => oExercicio.exercicio !== oDado.exercicio);
        loadDataGridExercicios();
    }
}

function excluirDados(oDado) {
    if(confirm('Confirma excluir este registro?')) {
        loadAjax({
            method: 'DELETE',
            rota: `treinos/${oDado.id}`,
            success: () => {
                message('Treino excluído com sucesso', 'success');
                buscaDados();
            }
        });
    }
}

function openModalVisualizacao(oDados) {
    $('#form_exercicio').hide();
    $('#modal_incluir_treino_label').text('Visualizar treino');
    openModal('modal_incluir_treino');
    setDadosModal(oDados);
    $('#aluno, #aluno_nome').prop('disabled', 'true');
    buscaExercicios(oDados.id, true);
    $('#btn_confirmar').hide();
}

function openModalAlteracao(oDados) {
    $('#modal_incluir_treino_label').text('Alterar treino');
    openModal('modal_incluir_treino');
    setDadosModal(oDados);
    $('#aluno, #aluno_nome').prop('disabled', 'true');
    buscaExercicios(oDados.id, false);
    $('#btn_confirmar').show();
    $('#form_exercicio').show();
}

function setDadosModal(oDados) {
    $('#codigo').val(oDados.id);
    $('#aluno').val(oDados.codigo_aluno);
    $('#aluno_nome').val(oDados.nome_aluno);
}

function buscaExercicios(codigoTreino, isVisualizacao) {
    loadAjax({
        method: 'GET',
        rota: `treinos/${codigoTreino}/exercicios`,
        success: (result) => {
            aExercicios = result;
            loadDataGridExercicios(isVisualizacao);
        }
    })
}