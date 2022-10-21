
function closeMessage(event) {
    event.currentTarget.parentElement.style.display = "none";
}

function closeF() {
    const form = document.getElementsByClassName('area-form-user').item(0);
    form.remove();
}