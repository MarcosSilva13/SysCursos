window.addEventListener('load', () => {
    const formEdit = document.querySelector('#form-edit-company');

    formEdit.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    document.querySelector('#send-data').addEventListener('click', () => {
        const data = new FormData(formEdit);
        console.log(data);
        data.append('id_company', formEdit.id_company.value);
        data.append('name_company', formEdit.name_company.value);
        data.append('cnpj_company', formEdit.cnpj_company.value);
        data.append('email_company', formEdit.email_company.value);
        data.append('tel_company', formEdit.tel_company.value);
        data.append('description_company', formEdit.description_company.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('editCompany.php', config)
        .then((response) => {
            return response.json();
        })
        .then((json) => {
            let notification = document.getElementById('messages');
            if (json.status == 'ok') {
                notification.innerHTML = 
                `<div class="message-confirm">`
                    + json.message + `
                    <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                </div>`;
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
    });
});