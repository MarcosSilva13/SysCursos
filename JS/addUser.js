window.addEventListener('load', () => {
    document.forms[0].addEventListener('submit', (event) => {
        event.preventDefault();
    });

    /*document.getElementById('send-data-user').addEventListener('click', () => {
        const data = new FormData(document.forms[0]);
        data.append('login_user', document.forms[0].login_user.value);
        data.append('name_user', document.forms[0].name_user.value);
        data.append('cpf_user', document.forms[0].cpf_user.value);
        data.append('email_user', document.forms[0].email_user.value);
        data.append('password_user', document.forms[0].password_user.value);
        data.append('tel_user', document.forms[0].tel_user.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('../registration.php', config);
    });*/
});