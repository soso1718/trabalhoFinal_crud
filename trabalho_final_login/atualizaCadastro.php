<?php 
require_once 'conexao.php';
require_once 'seguranca.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];

if(!empty($id) && !empty($nome) && !empty($email) && !empty($cpf)){
    try{
        $sql = "UPDATE cadastro SET nome = ?, email = ?, cpf = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$nome, $email, $cpf, $id]);

        header("Location: cadastro.php?sucesso=3");
        exit;
    }catch(PDOException $erro){
        echo "Erro ao atualizar: " . $erro->getMessage();
    }
}else{
    echo "Preencha todos os campos";
}

?>