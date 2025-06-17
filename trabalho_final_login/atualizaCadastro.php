<?php 
require_once 'conexao.php';

if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt=$conexao->prepare("SELECT * FROM cadastro WHERE id = :id");
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$rs){
            echo "Paciente não encontrado";
            exit;
        }
}

    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];

         $stmt = $conexao->prepare("SELECT * FROM cadastro WHERE id = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $registro = $stmt->fetch(PDO::FETCH_ASSOC);

            var_dump($registro); 
        
        $verificar=$conexao->prepare("SELECT * FROM cadastro WHERE id = :id");
        $verificar->bindValue(":id", $id);
        $verificar->execute();

        if($verificar->rowCount()>0){
            if(empty($nome) || empty($email) || empty($cpf)){
                echo "Campos vazios! Preencha todos para atualizar";
            } else{
                $update = $conexao->prepare("UPDATE cadastro SET nome = :nome, email = :email, cpf = :cpf WHERE id = :id");

                $update->bindParam(":nome", $nome, PDO::PARAM_STR);
                $update->bindParam(":email", $email, PDO::PARAM_STR);
                $update->bindParam(":cpf", $cpf, PDO::PARAM_INT); 
                $update->bindParam(":id", $id, PDO::PARAM_INT);
                $update->execute();
                    if($update->rowCount()>0){
                        header("Location: cadastro.php?sucesso=3");
                        exit;}
                    else{
                        echo "Nenhuma alteração foi feita.";
                    }
            }
        
        }else{
            echo "Paciente não encontrado";}
        
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar cadastro</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <form id="atualizar" action="" method="POST">
        <label> Nome: </label> <br>
            <input type = "text" name="nome" value="<?php echo isset($rs['nome']) ? $rs['nome'] : '';?>" required> <br> <br>
        <label>E-mail: </label> <br>
            <input type = "email" name="email" value="<?php echo isset($rs['email']) ? $rs['email'] : '';?>" required> <br> <br>
        <label> CPF: </label> <br>
            <input type = "number" name="cpf" value="<?php echo isset($rs['cpf']) ? $rs['cpf'] : '';?>" required> <br> <br>
        <input type="hidden" name="id" value="<?php echo isset($rs['id']) ? $rs['id'] : '';?>">

        <div id="botao_atualizar">
            <button type="submit">EDITAR</button>
        </div>
    </form>
</body>
</html>