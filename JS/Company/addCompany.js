window.addEventListener('load', () => {
    const formAdd = document.querySelector('#form-add-company');
    
    
    formAdd.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    document.querySelector('#send-data').addEventListener('click', () => {
        const data = new FormData(formAdd);
        console.log(data);
        data.append('name_company', formAdd.name_company.value);
        data.append('cnpj_company', formAdd.cnpj_company.value);
        data.append('email_company', formAdd.email_company.value);
        data.append('tel_company', formAdd.tel_company.value);
        data.append('description_company', formAdd.description_company.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('registerCompany.php', config)
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
                formAdd.reset();
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