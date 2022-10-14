function openMenu() {
    document.getElementById('menu').style.width = '250px';
    document.getElementById('content').style.marginLeft = '250px';
}

function closeMenu() {
    document.getElementById('menu').style.width = '0px';
    document.getElementById('content').style.marginLeft = '0px';
}

const home = `<h1>SysCursos</h1>
<p>Todo conteúdo do sistema aqui.</p>`

const cursos = `nada`

function exibir(number) {
    if (number === 1) {
        document.getElementById('content').innerHTML = home
    } 
    if (number === 2) {
        document.getElementById('content').innerHTML = cursos
    }
}
