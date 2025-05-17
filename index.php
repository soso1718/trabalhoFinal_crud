<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title><link rel="stylesheet" href="css/style_login.css">
    

</head>
<body>
    <h1>Seja bem vindo! Digite seu e-mail e senha para entrar. </h1> <br> <br>
    <form action="login.php" method="POST">
        <div id="login">
            <pre>     E-mail: </pre>
            <input type = "text" name="email"> <br> <br>
            <pre>    Senha:  </pre>
            <input type = "password" name="senha"> 
        </div>

        <div id="botao">
        <button type="submit">ENTRAR</button>
        </div>
    </form>
   
</body>
</html>