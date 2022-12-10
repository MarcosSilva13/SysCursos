window.addEventListener('load', () => {
    const button = document.querySelectorAll('#excluir');

    for (let i = 0; i < button.length; i++) {
        button[i].addEventListener('click', (event) => {
            event.preventDefault();

            let result = window.confirm('Deseja realmente remover a empresa?');

            if (result) {
                const data = new FormData(event.target.parentElement);
                data.append('id_company', event.target.parentElement.id_company.value);

                const config = {
                    method: 'POST',
                    body: data
                };

                fetch('deleteCompany.php', config)
                .then((response) => {
                    return response.json();
                })
                .then((json) => {
                    let notification = document.getElementById('messages');
                    if (json.status == 'ok') {
                        notification.innerHTML = 
                        `<div class="message-confirm"> `
                            + json.message + `
                            <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                        </div>`;
                        setTimeout(() => { window.location.reload(true); }, 2000); //recarrega a pagina depois de 2s
                    } else if (json.status == 'warning') {
                        notification.innerHTML = 
                        `<div class="message-warning">`
                            + json.message + `
                            <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                        </div>`;
                    } else if (json.status == 'error') {
                        notification.innerHTML = 
                        `<div class="message-error">`
                            + json.message + `
                            <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                        </div>`;
                    }
                });
            }
        });  
    }
});