<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo.css"/>
    <title>Login</title>
</head>
<body>
    <section class="area-login">
        <div class="login">
            <div>
                <h1>SysCursos</h1>
                <!--<img src="imagens/SysCursos.png">-->
            </div>

            <form action="" method="POST">
                <label for="nome">Usuário ou email</label>
                <input type="text" name="nome" autofocus> 
                <label for="senha">Senha</label>
                <input type="password" name="senha">
                <input type="submit" id="send-data-login" value="entrar"> 
            </form>
            <p>Ainda não tem uma conta?<a href="view/formAddUser.php">Criar conta</a></p>
        </div>
    </section>
</body>
</html>