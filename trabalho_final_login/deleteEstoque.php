<?php 
require_once 'conexao.php';
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $verificar=$conexao->prepare("SELECT * FROM estoque WHERE id_lote = :id_lote");
        $verificar->bindValue(":id_lote", $id);
        $verificar->execute();

        if($verificar->rowCount()>0){
            $excluir=$conexao->prepare("DELETE FROM estoque WHERE id_lote=:id_lote");
            $excluir->bindValue(":id_lote", $id);
            if($excluir->execute()){
                header("Location: estoque.php?sucesso=2");
            }else 
                echo "Não foi possivel excluir";
        } else{
            echo "Paciente não encontrado";
        }
    }
?>