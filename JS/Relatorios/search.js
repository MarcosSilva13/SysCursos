window.addEventListener('load', () => {
    const formSearch = document.querySelector('#form-search');

    formSearch.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    document.querySelector('#tipo').addEventListener('change', () => {
        const tipo = document.getElementById('tipo').value;
        let termo = document.getElementById('search');
        switch (tipo) {
            case 'all':
                termo.style.display = "none";
                break;
            case 'data':
                termo.style.display = "flex";
                termo.setAttribute("placeholder", "Pesquisando por Data");
                termo.setAttribute("type", "date");
                termo.value = '';
                break;
            case 'usuario':
                termo.style.display = "flex";
                termo.setAttribute("placeholder", "Pesquisando por Cliente");
                termo.setAttribute("type", "text");
                termo.value = '';
                break;
            case 'curso':
                termo.style.display = "flex";
                termo.setAttribute("placeholder", "Pesquisando por Curso");
                termo.setAttribute("type", "text");
                termo.value = '';
                break;
            case 'empresa':
                termo.style.display = "flex";
                termo.setAttribute("placeholder", "Pesquisando por Fornecedor");
                termo.setAttribute("type", "text");
                termo.value = '';
                break;
            case 'valor':
                termo.style.display = "flex";
                termo.setAttribute("placeholder", "Pesquisando por Valor");
                termo.setAttribute("type", "number");
                termo.value = '';
                break;
            case 'pagamento':
                termo.style.display = "flex";
                termo.setAttribute("placeholder", "Pesquisando por Pagamento");
                termo.setAttribute("type", "text");
                termo.value = '';
                break;
            default:
                termo.style.display = "flex";
                termo.setAttribute("placeholder", "Pesquisando por...");
                termo.setAttribute("type", "text");
                termo.value = '';
                break;
        }
    });

    document.querySelector('#enviar').addEventListener('click', () => {
        const data = new FormData(formSearch);
        data.append('search', formSearch.search.value);
        data.append('tipo', formSearch.tipo.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('../Admin/listReports.php', config)
        .then((response) => {
            return response.json();
        })
        .then((json) => {
            let notification = document.getElementById('messages');
            notification.innerHTML = '';

            if (json != null) {
                let tbody = document.getElementById('dados');
                tbody.innerText = '';
                for (let i = 0; i < json.length; i++) {
                    const date = new Date(json[i].data);

                    let tr = tbody.insertRow();
                    let td_num_venda = tr.insertCell();
                    let td_data = tr.insertCell();
                    let td_cliente = tr.insertCell();
                    let td_curso = tr.insertCell();
                    let td_fornecedor = tr.insertCell();
                    let td_valor = tr.insertCell();
                    let td_pagamento = tr.insertCell();
                    let td_acao = tr.insertCell();

                    td_num_venda.innerText = json[i].num_venda;
                    td_data.innerText = json[i].data.split('-').reverse().join('/');
                    td_cliente.innerText = json[i].usuario;
                    td_curso.innerText = json[i].curso;
                    td_fornecedor.innerText = json[i].empresa;
                    td_valor.innerText = json[i].valor;
                    td_pagamento.innerText = json[i].pagamento;
                    td_acao.innerHTML = `<form id="form-reports" action="" method="POST">
                    <input type="hidden" name="id_reports" id="id_reports" value="`+ json[i].id_relatorio + `"/>
                    <input type="submit" id="cancel" value="Excluir"/>
                    </form>`;
                }
            } else if (json == '' || json == null) {
                notification.innerHTML = 
                `<div class="message-error">
                    Pesquisa sem resultados!
                    <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                </div>`;
            }
        });
    });
});