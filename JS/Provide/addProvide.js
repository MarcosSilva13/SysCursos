window.addEventListener('load', () => {
    const formAdd = document.querySelector('#form-add-provide');

    formAdd.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    document.querySelector('#btn-reg').addEventListener('click', () => {
        const data = new FormData(formAdd);
        data.append('company', formAdd.company.value);
        data.append('company', formAdd.course.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('registerProvides.php', config)
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