<?php 
require_once 'conexao.php';
require_once 'seguranca.php';

$id_lote = $_POST['id_lote'];
$produto = $_POST['produto'];
$validade = $_POST['validade'];
$quantidade = $_POST['quantidade'];
$categoria = $_POST['categoria'];

if(!empty($id_lote) && !empty($produto) && !empty($validade) && !empty($quantidade) && !empty($categoria) ){
    try{
        $sql = "UPDATE estoque SET produto = ?, validade = ?, quantidade = ?, categoria = ? WHERE id_lote = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$produto, $validade, $quantidade, $categoria, $id_lote]);

        header("Location: estoque.php?sucesso=3");
        exit;
    }catch(PDOException $erro){
        echo "erro ao atualizar: " . $erro->getMessage();
    }
}else{
    echo "preencha todos os campo";
}

?>