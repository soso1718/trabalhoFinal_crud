<?php 
require_once 'conexao.php';
require_once 'seguranca.php';

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $verificar=$conexao->prepare("SELECT * FROM estoque WHERE id_lote = :id_lote");
        $verificar->bindValue(":id_lote", $id);
        $verificar->execute();

        if($verificar->rowCount()>0){
            $lote = $verificar->fetch(PDO::FETCH_ASSOC);
        }else{
            echo "lote não encontrado";
            exit;
        }


    }
?>

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
    require_once 'seguranca.php'; ?>
    <menu id="cabecalho">
        <img src="images/logo.png"> 
        <li><a href="http://localhost/trabalho_final_login/pagPrincipal.php">Início</a></li>
        <li><a href="http://localhost/trabalho_final_login/pagCadastro.php">Cadastro de pacientes</a></li>
        <li><a href="http://localhost/trabalho_final_login/estoque.php">Estoque</a></li>
        <li><a href="http://localhost/trabalho_final_login/agendamento.php">Agendamentos</a></li>
        <li><a href="http://localhost/trabalho_final_login/catalogo.php">Catálogo</a></li>
    </menu>
    
    <h1>Alterar lote</h1>
    <form id="estoque" action="atualizaEstoque.php" method="POST">
    <label> Produto: </label> <br>
        <input type = "text" name="produto" value="<?php echo $lote['produto'];?>" required> <br> <br>
    <label> Validade: </label> <br>
        <input type = "date" name="validade" value="<?php echo $lote['validade'];?>" required> <br> <br>
    <label> Quantidade: </label> <br>
        <input type = "number" name="quantidade" value="<?php echo $lote['quantidade'];?>" required> <br> <br>
    <label> Categoria: </label> <br>
        <input type = "text" name="categoria" value="<?php echo $lote['categoria'];?>" required> <br> <br>
    <input type="hidden" name="id_lote" value="<?php echo $lote['id_lote'];?>">

    <div id="botao_estoque">
        <button type="submit">ALTERAR LOTE</button>
    </div>

    </form>
</body>
</html>


