window.addEventListener('load', () => {
    const formAdd = document.querySelector('#form-sale');

    formAdd.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    document.querySelector('#btn-fin').addEventListener('click', () => {
        const data = new FormData(formAdd);
        data.append('id_user', formAdd.id_user.value);
        data.append('id_course', formAdd.id_course.value);
        data.append('course_name', formAdd.course_name.value);
        data.append('course_duration', formAdd.course_duration.value);
        data.append('course_price', formAdd.course_price.value);
        data.append('company_name', formAdd.company_name.value);
        data.append('payment', formAdd.payment.value);
        data.append('password', formAdd.password.value);

        const config = {
            method: 'POST',
            body: data
        };

        fetch('../confirmSale.php', config)
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
               
                formAdd.parentElement.remove();

                setTimeout(() => {
                    window.location.href= 'coursesDefault.php';
                }, 3000);
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