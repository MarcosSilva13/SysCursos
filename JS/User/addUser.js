window.addEventListener('load', () => {
    const formAdd = document.querySelector('#form-add-user');
    
    formAdd.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    document.querySelector('#send-data-user').addEventListener('click', () => {
        const data = new FormData(formAdd);
        data.append('login_user', formAdd.login_user.value);
        data.append('name_user', formAdd.name_user.value);
        data.append('cpf_user', formAdd.cpf_user.value);
        data.append('email_user', formAdd.email_user.value);
        data.append('password_user', formAdd.password_user.value);
        data.append('tel_user', formAdd.tel_user.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('../registration.php', config)
        .then((response) => {
            return response.json();
        })
        .then((json) => {
            let notification = document.getElementById('messages');
            if (json.status == 'ok') {
                notification.innerHTML = 
                `<div class="message-confirm"> `
                    + json.message + `
                    <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    Faça login informando seu usuário e senha <a href="../index.php">aqui</a>.
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