<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <?php
        require_once 'seguranca.php'
    ?>

    <h1>O que você procura?</h1> <br>
    <div id="pagInicial">
        <!-- <form action="logout.php">
            <button type="submit">Logout</button> <br> <br>
        </form> -->

        <div class="inicio">
            <div class="div_logout">
                <img src="images/icon_logout.png"> 
                <button> <a href="http://localhost/trabalho_final_login/logout.php">Logout</a></button> <br> <br>
            </div>
            <div class="div_cadastro">
                <!-- <img src="images/icon_cadastro.png">  -->
                <button> <a href="http://localhost/trabalho_final_login/pagCadastro"> Cadastro de pacientes  </a> </button> <br> <br>
            </div>

            <div class="div_estoque">
                <img src="images/icon_estoque.png"> 
                <button><a href="http://localhost/trabalho_final_login/form_estoque.php"> Estoque </a> </button> <br> <br>
            </div>

            <div class="div_agendamentos">
                <img src="images/icon_agendamento.png"> 
                <button type="submit">Agendamentos</button> <br> <br>
            </div>

            <div class="div_catalogo">
                <!-- <img src="images/icon_catalogo.png">  -->
                <button type="submit">Catálogo</button> <br> <br>
            </div>
        </div>
    </div>

</body>
</html>