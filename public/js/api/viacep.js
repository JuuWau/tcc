const ViaCep = () => {
    async function getCepData(cep) {
        let cepTreated = cep.replace('-', '')
        return await $.ajax({
            url: `https://viacep.com.br/ws/${cepTreated}/json/`,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                return response;
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    return {
        getCepData
    }
}
