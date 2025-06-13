<?php 
require_once 'conexao.php';
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $verificar=$conexao->prepare("SELECT * FROM cadastro WHERE id = :id");
        $verificar->bindValue(":id", $id);
        $verificar->execute();

        if($verificar->rowCount()>0){
            $excluir=$conexao->prepare("DELETE FROM cadastro WHERE id=:id");
            $excluir->bindValue(":id", $id);
            if($excluir->execute()){
                header("Location: cadastro.php?sucesso=2");
            }else 
                echo "Não foi possivel excluir";
        } else{
            echo "Paciente não encontrado";
        }
    }
?>