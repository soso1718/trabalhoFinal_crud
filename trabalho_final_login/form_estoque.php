<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de estoque</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <?php 
    require_once 'seguranca.php';
    if(isset($_GET['erro'])){
        if($_GET['erro']==2){
            echo "<h3> Não foi possível adicionar o novo lote.</h3> ";
        }} ?>
    
    <h1>Adicionar lote</h1>
    <form id="estoque" action="estoque.php" method="POST">
    <label> Produto: </label> <br>
        <input type = "text" name="produto" required> <br> <br>
    <label> Validade: </label> <br>
        <input type = "date" name="validade" required> <br> <br>
    <label> Quantidade: </label> <br>
        <input type = "number" name="quantidade" required> <br> <br>
    <label> Categoria: </label> <br>
        <input type = "text" name="categoria" required> <br> <br>
    <input type="hidden" name="id" value="save">

    <div id="botao_estoque">
        <button type="submit">ADICIONAR AO ESTOQUE</button>
    </div>

    </form>
</body>
</html>