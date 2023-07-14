export default function EstadoCidade() {
    const estadoSelect = document.querySelector('.uf');
    const cidadeSelect = document.querySelector('.city');

    if (estadoSelect && cidadeSelect) {

        function buscarEstados() {
            fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome')
                .then(response => response.json())
                .then(data => {
                    estadoSelect.innerHTML = '<option value="">Selecione</option>';
                    cidadeSelect.innerHTML = '<option value="">Selecione um estado</option>';
                    data.forEach(estado => {
                        const option = document.createElement('option');
                        option.value = estado.id;
                        option.textContent = estado.nome;
                        estadoSelect.appendChild(option);
                    });
                });
        }

        estadoSelect.addEventListener('change', () => {
            if (estadoSelect.value !== '') {
                buscarCidades();
            } else {
                cidadeSelect.innerHTML = '';
                cidadeSelect.innerHTML = '<option value="">Selecione um estado</option>';
            }
        })

        function buscarCidades() {
            const estadoId = estadoSelect.value;

            if (estadoId) {
                fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoId}/distritos`)
                    .then(response => response.json())
                    .then(data => {
                        cidadeSelect.innerHTML = '';
                        data.forEach(cidade => {
                            const option = document.createElement('option');
                            option.value = cidade.id;
                            option.textContent = cidade.nome;
                            cidadeSelect.appendChild(option);
                        });
                    });
            }
        }

        window.onload = buscarEstados;
    }

}