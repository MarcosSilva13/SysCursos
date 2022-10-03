<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css"/>
    <title>Cadastro - Usuário</title>
</head>
<body>
    <script>
        function mascara(i,atributo) {
            var v = i.value;
            if (isNaN(v[v.length-1])) { // impede entrar outro caractere que não seja número
                i.value = v.substring(0, v.length-1);
                return;
            }
            if (atributo == "cpf") {
                i.setAttribute("maxlength", "14");
                if (v.length == 3 || v.length == 7) i.value += ".";
                if (v.length == 11) i.value += "-";
            }
            /*if (atributo == "tele") {
                i.setAttribute("maxlength", "14"); 
                //i.value += "(";
                if (v.length == 2) i.value += ")";
                if (v.length == 9) i.value += "-";
            }*/
        }

        /*function mascaraTel(i) {
            var v = i.value;
            if (isNaN(v[v.length-1])) {
                i.value = v.substring(0, v.length-1);
                return;
            }
            i.setAttribute("maxlength", "14");
            v[0] = "("; 
            //i.value += "(";
            if (v.length == 2) i.value += ")";
            if (v.length == 9) i.value += "-";
        }*/
    </script>
    <div class="area-form-user">
        <div class="form-user">
            <h1>Cadastro</h1>
            <form action="teste.php" method="POST">
                <!--<label for="id">Id</label>
                <input type="text" name="id-user" id="id-user"/>-->
                <div class="div-login-nome">
                    <div class="div-login">
                        <label for="login">Login</label>
                        <input type="text" name="login-user" id="login-user" placeholder="Ex: MarcosSilva25" required>
                    </div>

                    <div class="div-nome">
                        <label for="name">Nome</label>
                        <input type="text" name="name-user" id="name-user" placeholder="Seu nome completo" required>
                    </div>
                </div>

                <div class="div-cpf-email">
                    <div class="div-cpf">
                        <label for="cpf">CPF</label>
                        <input oninput="mascara(this, 'cpf')" type="text" name="cpf-user" id="cpf-user" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" placeholder="Ex: 123.456.789-10" required>
                    </div>
                    <div class="div-email">
                        <label for="email">Email</label>
                        <input type="email" name="email-user" id="email-user" placeholder="Ex: syscursos@gmail.com" required>
                    </div>
                </div>
                
                <div class="div-senha-tel">
                    <div class="div-senha">
                        <label for="password">Senha</label>
                        <input type="password" name="password-user" id="password-user" placeholder="Sua senha" required>
                    </div>
                    <div class="div-tel">
                        <label for="telephone">Telefone</label>
                        <input oninput="mascarat(this, 'tele')" type="tel" name="tel-user" id="tel-user" pattern="[(0-9)]{4}[0-9]{5}-[0-9]{4}" placeholder="Ex: (01)91234-5678" required>
                    </div>
                </div>
                <div class="botao-enviar">
                    <input type="submit" id="send-data-user" value="Enviar">
                </div>
            </form>
            <p>Já tem uma conta?<a href="../index.php">Login</a></p>
        </div>
    </div>
    <footer>
        <p>&copy; 2022</p>
    </footer>
</body>
</html>
