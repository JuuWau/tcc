$(function() {
    new TomSelect(".tom-select", {
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });

    $(document).on('click', '#togglePassword', function () {
        const input = $('#password');
        const icon = $('#iconPassword');

        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
    applyCpfMask('#cpf');
    applyCEPMask('#cep');

    setupListener();
    selectorInitialize();
});

function setupListener() {
    $(`#cep`).focusout(async function() {
        let cep = $(this).val();
        let response = await ViaCep().getCepData(cep)
        fillCepData(response)
    })
    $(`#state`).change(async function() {
        let estado = $(this).val();
        $(`#city`).empty();
        if (!estado) {
            $(`#city`).append(`<option value="">Selecione uma cidade: </option>`);
            return
        }

        populateCitiesSelect(estado);
    })
}

function fillCepData(data) {
    $(`#address`).val(data.logradouro)
    $(`#neighborhood`).val(data.bairro)
    if (data.uf) {
        $(`#state`).val(data.uf).trigger('change');
    }

    setTimeout(() => {
        if (data.localidade) {
            $(`#city`).val(data.localidade).trigger('change');
        }
    }, 1000);
}

async function selectorInitialize() {
    let ufDatas = await IbgeUf().getUfData()
    ufDatas.forEach(uf => {
        let option = `<option value="${uf.sigla}">${uf.nome}</option>`
        console.log(option);
        $(`#state`).append(option)
    })
    let stateSelect = $('#state').val();
    if (stateSelect) {
        $(`#state`).val(stateSelect);
        $(`#state`).trigger('change');
    }
}

async function populateStatesSelect(stateSelector, citySelector) {
    let response = await IbgeUf().getUfData();

    initStateSelectListener(stateSelector, citySelector);

    let selectorValue = $(`${stateSelector}`).val();
    let type = $(stateSelector).length;
    if (type) {
        populateSelect(response, 'sigla', 'nome', stateSelector, selectorValue);
    }
}

function initStateSelectListener(stateSelector, citySelector) {
    $(stateSelector).change(async function() {
        let estado = $(this).val();
        let cidadeAnterior = $(citySelector).val();
        $(citySelector).empty();
        if (!estado) {
            $(citySelector).append(`<option value="">Selecione</option>`);
            return
        }

        if (!cidadeAnterior) {
            cidadeAnterior = $(`${citySelector}`).val();
        }

        populateCitiesSelect(estado, citySelector, cidadeAnterior);
    })
}

async function populateCitiesSelect(estado) {
        let response = await IbgeUf().getMunicipioData(estado);
        populateSelect(response, 'nome', 'nome', `city`);
        let citySelect = $('#city').val();
        if (citySelect) {
            $(`#city`).val(citySelect);
            $(`#city`).trigger('change');
        }
    }

async function populateSelect(data, value, label, id) {
    let selectElement = $(`#${id}`);
    if (!selectElement.length) {
        console.error(`Elemento #${id} não encontrado.`);
        return;
    }

    selectElement.empty();
    selectElement.append(`<option value="">Selecione: </option>`);
    data.forEach((item) => {
        selectElement.append(`<option value="${item[value]}">${item[label]}</option>`);
        console.log(selectElement);
    });
}