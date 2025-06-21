<?php 
require_once 'conexao.php';
require_once 'seguranca.php';

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $verificar=$conexao->prepare("SELECT * FROM cadastro WHERE id = :id");
        $verificar->bindValue(":id", $id);
        $verificar->execute();

        if($verificar->rowCount()>0){
            $cadastro = $verificar->fetch(PDO::FETCH_ASSOC);
        }else{
            echo "paciente não encontrado";
            exit;
        }


    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar cadastro de paciente</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <?php 
    require_once 'seguranca.php'; ?>
    
     <h1>Alterar cadastro de paciente</h1>
    <form id="cadastro" action="atualizaCadastro.php" method="POST">
    <label> Nome: </label> <br>
        <input type = "text" name="nome" value="<?php echo $cadastro['nome'];?>" required> <br> <br>
    <label>E-mail: </label> <br>
        <input type = "email" name="email"value="<?php echo $cadastro['email'];?>" required> <br> <br>
    <label> CPF: </label> <br>
        <input type = "text" name="cpf" value="<?php echo $cadastro['cpf'];?>" required> <br> <br>
    <input type="hidden" name="id" value="<?php echo $cadastro['id'];?>">

    <div id="botao_cadastro">
        <button type="submit">Alterar</button> <br><br><br><br>

    </div>

    </form>
</body>
</html>


