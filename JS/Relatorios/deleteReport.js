window.addEventListener('load', () => {
    const button = document.querySelectorAll('#cancel');

    for (let i = 0; i < button.length; i++) {
        button[i].addEventListener('click', (event) => {
            event.preventDefault();

            let result = window.confirm("Deseja realmente excluir o relatório?");

            if (result) {
                const data = new FormData(event.target.parentElement);
                console.log(event.target.parentElement.id_reports.value);
                data.append('id_reports', event.target.parentElement.id_reports.value);

                const config = {
                    method: 'POST',
                    body: data
                };

                fetch('../Admin/deleteReports.php', config)
                .then((reponse) => {
                    return reponse.json();
                })
                .then((json) => {
                    let notification = document.getElementById('messages');
                    notification.innerHTML = '';

                    if (json.status == 'ok') {
                        notification.innerHTML = 
                        `<div class="message-confirm"> `
                            + json.message + `
                            <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                        </div>`;
                        setTimeout(() => { window.location.reload(true); }, 2000); //recarrega a pagina depois de 2s
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