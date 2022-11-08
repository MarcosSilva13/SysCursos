window.addEventListener('load', () => {
    const formAdd = document.querySelector('#form-add-course');

    formAdd.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    document.querySelector('#send-data').addEventListener('click', () => {
        const data = new FormData(formAdd);
        data.append('name_course', formAdd.name_course.value);
        data.append('price_course', formAdd.price_course.value);
        data.append('duration_course', formAdd.duration_course.value);
        data.append('description_course', formAdd.description_course.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('registerCourse.php', config)
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