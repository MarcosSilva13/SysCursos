window.addEventListener('load', () => {
    const formCourse = document.querySelectorAll('#form-course');

    console.log('Numero de forms:' + formCourse.length);

    const botao = document.querySelectorAll('#cancel');
    console.log('Numero de botões:' + botao.length);

    const data; //continuar
    for (let i = 0; i  < botao.length; ++i) {
        botao[i].addEventListener('click', (e) => {
            e.preventDefault();
            console.log(e.target.parentElement.id_sale.value);
            window.confirm(e.target.parentElement.id_sale.value);

            let data = e.target.parentElement.id_sale.value;
            console.log('data:' + data);
            
        });
    }



});