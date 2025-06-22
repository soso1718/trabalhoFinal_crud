<?php
require_once 'conexao.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
        $produto = (isset($_POST["produto"]) && $_POST["produto"] != null) ? $_POST["produto"] : "";
        $validade = (isset($_POST["validade"]) && $_POST["validade"] != null) ? $_POST["validade"] : "";
        $quantidade = (isset($_POST["quantidade"]) && $_POST["quantidade"] != null) ? $_POST["quantidade"] : "";
        $categoria = (isset($_POST["categoria"]) && $_POST["categoria"] != null) ? $_POST["categoria"] : "";

        if ( $produto != NULL && $validade != NULL && $quantidade != NULL && $categoria != NULL) {
            try {
                    $stmt = $conexao->prepare("INSERT INTO estoque (produto, validade, quantidade, categoria) VALUES (?, ?, ?, ?)");
                    $stmt->bindParam(1, $produto);
                    $stmt->bindParam(2, $validade);
                    $stmt->bindParam(3, $quantidade);
                    $stmt->bindParam(4, $categoria);
                        if ($stmt->execute()) {
                            if ($stmt->rowCount() > 0) {
                                header("location:estoque.php?sucesso=1");
                                exit;
                            } else { 
                                header("location:form_estoque.php?erro=2");
                                exit;}
                        }else {
                            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }}catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }}}
// ?>



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
    if(isset($_GET['sucesso'])){
        if($_GET['sucesso']==1){
            echo "<h3> Lote adicionado com sucesso!</h3> ";
        } elseif($_GET['sucesso']==2){
            echo "<h3> Lote removido com sucesso!</h3>";
        }else{
            echo "<h3> Lote atualizado com sucesso! </h3>";
        }
    }
?>
<menu id="cabecalho">
        <img src="images/logo.png"> 
        <li><a href="http://localhost/trabalho_final_login/pagPrincipal.php">Início</a></li>
        <li><a href="http://localhost/trabalho_final_login/pagCadastro.php">Cadastro de pacientes</a></li>
        <li><a href="http://localhost/trabalho_final_login/form_estoque.php">Cadastrar lote</a></li>
        <li><a href="http://localhost/trabalho_final_login/agendamento.php">Agendamentos</a></li>
        <li><a href="http://localhost/trabalho_final_login/catalogo.php">Catálogo</a></li>
    </menu>

    <h1>Gerenciador de estoque</h1>
        <?php
        try {
            $stmt = $conexao->prepare("SELECT * FROM estoque");
            if ($stmt->execute()) {
                echo "<div class='caixinhas'>";
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<div class='caixa'>";
                echo "<p><strong>Produto: </strong>".$rs->produto."</p> <br>";
                echo "<p><strong>Validade: </strong>".$rs->validade."</p> <br>";
                echo "<p><strong>Quantidade: </strong>".$rs->quantidade."</p> <br>";
                echo "<p><strong>Categoria: </strong>".$rs->categoria."</p> <br>";
                echo "<div class='acoes'>";
                echo "<a href=\"http://localhost/trabalho_final_login/form_atualizaEstoque.php?id=".$rs->id_lote."\">[Alterar]</a>";
                echo "<a href=\"http://localhost/trabalho_final_login/deleteEstoque.php?id=".$rs->id_lote."\" onclick=\"return confirm('Tem certeza que deseja excluir esse paciente?')\">[Excluir]</a>" ;
                echo "</div>";
                echo "</div>";
                } echo "</div>";
            } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
            }
        } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
        }
    ?>
    <button><a href="http://localhost/trabalho_final_login/form_estoque.php"> Adicionar novo lote </a></button>

    
</body>
</html>