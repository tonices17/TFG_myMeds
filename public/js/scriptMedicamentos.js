document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const resultsList = document.getElementById('results');
    const medicamentoDetalle = document.getElementById('medicamento-detalle');

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim();

        if (query.length > 2) {
            fetchMedicamentos(query)
                .then(results => displayResults(results))
                .catch(error => console.error('Error fetching data:', error));
        } else {
            resultsList.innerHTML = '';
        }
    });

    async function fetchMedicamentos(query) {
        const url = `https://cima.aemps.es/cima/rest/medicamentos?nombre=${query}`;
        const response = await fetch(url);
        if (response.ok) {
            const data = await response.json();
            return data.resultados || [];
        } else {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
    }

    function displayResults(medicamentos) {
        resultsList.innerHTML = '';
        if (medicamentos.length === 0) {
            resultsList.innerHTML = '<li>No se encontraron resultados</li>';
        } else {
            medicamentos.forEach(med => {
                const li = document.createElement('li');
                li.textContent = `${med.nombre} - Nº Registro: ${med.nregistro}`;
                li.dataset.nregistro = med.nregistro;  // Guarda el número de registro del medicamento
                li.addEventListener('click', function () { // Utilizamos una función de cierre
                    const nregistro = this.dataset.nregistro; // Obtenemos el número de registro del elemento clicado
                    selectMedicamento(nregistro, med.nombre); // Pasamos el número de registro y el nombre del medicamento
                    resultsList.innerHTML = ''; // Cerramos el desplegable
                });
                resultsList.appendChild(li);
            });
        }
    }

    async function selectMedicamento(nregistro, nombre) { // Modificamos la función para que reciba el nombre del medicamento
        searchInput.value = nombre; // Establecemos el nombre del medicamento en el campo de búsqueda
        if (!nregistro) {
            console.error('Número de registro no definido');
            return;
        }

        const url = `https://cima.aemps.es/cima/rest/medicamento?nregistro=${nregistro}`;
        const response = await fetch(url);
        if (response.ok) {
            const medicamento = await response.json();
            displayMedicamentoDetalle(medicamento);
        } else {
            console.error('Error fetching medicamento details:', response.status, response.statusText);
        }
    }

    function displayMedicamentoDetalle(medicamento) {
        const excipientesFormatted = medicamento.excipientes && medicamento.excipientes.length > 0
            ? medicamento.excipientes
                .map(exc => `${exc.nombre} (${exc.cantidad} ${exc.unidad})`)
                .join(', ')
            : 'No contiene excipientes';

        const imagenMedicamento = medicamento.fotos && medicamento.fotos.length > 0
            ? `<img id="imagenMedicamento" src="${medicamento.fotos[0].url}" alt="Imagen del medicamento">`
            : '';

        medicamentoDetalle.innerHTML = `
            <h2 class="nav__logo-letra" style="color: black;">${medicamento.nombre}</h2>
            <p><strong>Número de registro:</strong> ${medicamento.nregistro}</p>
            <p><strong>Laboratorio:</strong> ${medicamento.labtitular}</p>
            <p><strong>Código ATC:</strong> ${medicamento.atcs[2].codigo}</p>
            <p><strong>Principio activo:</strong> ${medicamento.pactivos}</p>
            <p><strong>Número de principios activos:</strong> ${medicamento.principiosActivos.length}</p>
            <p><strong>Excipientes:</strong> ${excipientesFormatted}</p>
            <p><strong>Comercializado:</strong> ${medicamento.comerc ? 'Sí' : 'No'}</p>
            <p><strong>Condiciones de prescripción:</strong> ${medicamento.cpresc}</p>
            <p><strong>Vía de administración:</strong> ${medicamento.viasAdministracion[0].nombre}</p>
            ${imagenMedicamento}
        `;
    }
});
