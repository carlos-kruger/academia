function loadAjax(settings) {
    settings.rota     = (settings.rota     ? settings.rota     : '');
    settings.url      = (settings.url      ? settings.url      : 'http://127.0.0.1:8000/api');    
    settings.method   = (settings.method   ? settings.method   : 'GET');
    settings.async    = (settings.async    ? settings.async    : true);
    settings.dataType = (settings.dataType ? settings.dataType : 'json');
    settings.data     = (settings.data     ? settings.data     : {});
    settings.success  = (settings.success  ? settings.success  : (result) => {console.log(result)});
    settings.error    = (settings.error    ? settings.error    : (error) => {console.log(error)});

    $.ajax({
        url: `${settings.url}/${settings.rota}`,
        method: settings.method,
        async: settings.async,
        dataType: settings.dataType,
        data: settings.data,
        success: settings.success,
        error: settings.error
    });
}

function getValue(idCampo) {
    return $(`#${idCampo}`).val().trim();
}

function openModal(idModal) {
    $(`#${idModal}`).modal('show');
}

function closeModal(idModal) {
    $(`#${idModal}`).modal('hide');
}

function catchError(error) {
    if(error.status === 404) {
        message('Erro ao processar os dados', 'error');
    }
    else {
        message(error.responseJSON[1], 'warning');
    }
}

function message(mensagem, tipo) {
    let title = 'Aviso';
    if(tipo === 'success') {
        title = 'Sucesso';
    }

    Lobibox.notify(tipo, {
        title: title,
        position: 'top right',
        pauseDelayOnHover: true,
        icon: false,
        continueDelayOnInactiveTab: false,
        sound: false,
        msg: mensagem
    });
}

function criaIcone(settings) {
    return $('<i>', {
        class: `fas fa-${settings.class}`,
        title: settings.title,
        css: {
            cursor: 'pointer',
            padding: '5px',
            opacity: (!settings.disabled ? '1' : '0.3')
        },
        click: (!settings.disabled ? settings.click : null)
    })
}

function buscaCliente(codigoCliente) {
    if(codigoCliente) {
        loadAjax({
            rota: `alunos/${codigoCliente}`,
            success: (result) => {
                $('#aluno_nome').val(result.nome)
            },
            error: (error) => {
                $('#aluno, #aluno_nome').val('');
                catchError(error);
            }
        })
    }
    else {
        $('#aluno, #aluno_nome').val('');
    }
}