<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title><link rel="stylesheet" href="css/style_login.css">
    

</head>
<body>
    <?php 
        if(isset($_GET['erro'])){
            if($_GET['erro']==1){
                echo "<h3> Ops, e-mail ou senha incorretos!Por favor tente novamente.</h3> <br>";
        }}
    ?>
    
    <h1>Seja bem vindo! Digite seu e-mail e senha para entrar. </h1> <br> <br>
    <form action="login.php" method="POST">
        <div id="login">
            <pre>     E-mail: </pre>
            <input type = "email" name="email"> <br> <br>
            <pre>    Senha:  </pre>
            <input type = "password" name="senha"> 
        </div>

        <div id="botao">
        <button type="submit">ENTRAR</button>
        </div>
    </form>
   
</body>
</html>