window.addEventListener('load', () => {

    const formEdit = document.querySelector('#form-edit-course');

    formEdit.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    document.querySelector('#send-data').addEventListener('click', () => {
        const data = new FormData(formEdit);
        data.append('id_course', formEdit.id_course.value);
        data.append('name_course', formEdit.name_course.value);
        data.append('price_course', formEdit.price_course.value);
        data.append('duration_course', formEdit.duration_course.value);
        data.append('description_course', formEdit.description_course.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('editCourse.php', config)
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