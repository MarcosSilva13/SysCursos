window.addEventListener('load', () => {
    const formLogin = document.querySelector('#login-user');

    formLogin.addEventListener('submit', (event) => {
        event.preventDefault();
    })

    document.querySelector('#send-data-login').addEventListener('click', () => {
        const data = new FormData(formLogin);
        data.append('user', formLogin.user.value);
        data.append('password', formLogin.password.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('login.php', config)
        .then((response) => {
            return response.json();
        })
        .then((json) => {
            let notification = document.getElementById('messages');
            if (json.status == 'ok' && json.tipo == 'administrador') {
                window.location.href= 'Admin/coursesAdmin.php';
            } else if (json.status == 'ok' && json.tipo == 'usuario') {
                window.location.href= 'view/coursesDefault.php';
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