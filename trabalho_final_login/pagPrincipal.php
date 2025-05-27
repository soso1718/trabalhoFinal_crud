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
        <form action="logout.php">
            <button type="submit">Logout</button> <br> <br>
        </form>
        <button type="submit">Cadastro de novos pacientes</button> <br> <br>
        <button type="submit">Estoque</button> <br> <br>
        <button type="submit">Agendamentos</button> <br> <br>
        <button type="submit">Catálogo</button> <br> <br>
    </div>

</body>
</html>