function confirmDelete(msg, url) {
    let result = window.confirm(msg);

    if (result) {
        fetch(url)
        .then((response) => {
            return response.json();
        })
        .then((json) => {
            if (json.status == 'ok') {
                window.location.href= '../index.php';
            } else if (json.status == 'error') {
                window.alert('Não foi possível deletar sua conta.');
            }
        });
    }
}