const IbgeUf = () => {
    async function getUfData() {
        try {
            const response = await $.ajax({
                url: `https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome`,
                type: 'get',
                dataType: 'json'
            });
            return response;
        } catch (error) {
            console.error('Erro ao buscar estados:', error);
            return [];
        }
    }

    async function getMunicipioData(uf) {
        try {
            const response = await $.ajax({
                url: `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${uf}/municipios`,
                type: 'get',
                dataType: 'json'
            });
            return response;
        } catch (error) {
            console.error('Erro ao buscar municípios:', error);
            return [];
        }
    }

    return {
        getUfData,
        getMunicipioData
    }
}