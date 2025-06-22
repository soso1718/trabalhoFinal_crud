<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>

<body>
    <?php 
        if(isset($_GET['erro'])){
            if($_GET['erro']==1){
                echo "<h3> Ops, e-mail ou senha incorretos!Por favor tente novamente.</h3> <br>";
        }}
    ?>
    <div id="logo"><img src="images/logo.png"> </div> <br> <br> 
    <h1>Seja bem vindo novamente! Digite seu e-mail e senha para entrar. </h1> <br> <br>
    <form action="login.php" method="POST">
        <div id="login">
            <label>E-mail: </label> <br>
                <input type = "email" name="email" required> <br> <br>

            <label>Senha: </label> <br>   
                <input type = "password" name="senha" required>  <br> <br>
        </div>

        <div id="botao_login">
            <button type="submit">ENTRAR</button>
        </div>
    </form>
   
</body>
</html>