<?php   
    global $conexao;

    try {
        $conexao = new PDO("mysql:host=localhost; dbname=projetorenan_crud", "root", "");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("set names utf8");
    } catch (PDOException $erro) {
        echo "Erro na conexão:" . $erro->getMessage();
    }

?>