window.addEventListener('load', () => {
    const formEdit = document.querySelector('#form-edit-user');

    formEdit.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    document.querySelector('#send-data').addEventListener('click', () => {
        const data = new FormData(formEdit);
        data.append('id_user', formEdit.id_user.value);
        data.append('bd_pass', formEdit.bd_pass.value);
        data.append('login_user', formEdit.login_user.value);
        data.append('name_user', formEdit.name_user.value);
        data.append('cpf_user', formEdit.cpf_user.value);
        data.append('email_user', formEdit.email_user.value);
        data.append('password_user', formEdit.password_user.value);
        data.append('tel_user', formEdit.tel_user.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('../editUser.php', config)
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
                Por favor faça login novamente clicando <a href="../logout.php">aqui</a>
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