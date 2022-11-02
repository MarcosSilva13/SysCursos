function confirmDelete(msg, url) {
    let result = window.confirm(msg);

    if (result) {
        window.location.href= url;
    }
}