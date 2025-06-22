<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de cadastro</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>

<body>
    <?php 
        require_once 'seguranca.php';

        if(isset($_GET['erro'])){
            if($_GET['erro']==2){
                echo "<h3> Não foi possível realizar o cadastro.</h3> <br>";
        }}
    ?>
    <menu id="cabecalho">
        <img src="images/logo.png"> 
        <li><a href="http://localhost/trabalho_final_login/pagPrincipal.php">Início</a></li>
        <li><a href="http://localhost/trabalho_final_login/cadastro.php">Listagem de pacientes</a></li>
        <li><a href="http://localhost/trabalho_final_login/estoque.php">Estoque</a></li>
        <li><a href="http://localhost/trabalho_final_login/agendamento.php">Agendamentos</a></li>
        <li><a href="http://localhost/trabalho_final_login/catalogo.php">Catálogo</a></li>
    </menu>

    <h1>Cadastrar novo paciente</h1>

    <form id="cadastro" action="cadastro.php" method="POST">
    <label> Nome: </label> <br>
        <input type = "text" name="nome" required> <br> <br>
    <label>E-mail: </label> <br>
        <input type = "email" name="email" required> <br> <br>
    <label> CPF: </label> <br>
        <input type = "text" name="cpf" required> <br> <br>
    <input type="hidden" name="id" value="save">

    <div id="botao_cadastro">
        <button type="submit">CADASTRAR</button> <br>

       
    </div>

    </form>

   
</body>
</html>