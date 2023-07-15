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
                        console.log(estado);
                        const option = document.createElement('option');
                        option.value = estado.id;
                        option.textContent = estado.nome;
                        option.dataset.uf = estado.sigla;
                        estadoSelect.appendChild(option);
                    });
                });
        }

        estadoSelect.addEventListener('change', (e) => {
            if (estadoSelect.value !== '') {
                const selectedOption = e.currentTarget.options[e.currentTarget.selectedIndex];
                e.currentTarget.dataset.uf = selectedOption.dataset.uf;
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