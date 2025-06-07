<?php
require_once 'conexao.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
        $email = (isset($_POST["email"]) && $_POST["email"] != null) ? $_POST["email"] : "";
        $cpf = (isset($_POST["cpf"]) && $_POST["cpf"] != null) ? $_POST["cpf"] : "";
    } else {
        $nome = NULL;
        $email = NULL;
        $cpf = NULL;
    }

    if ($nome != NULL && $email != NULL && $cpf != NULL) {
        try {
            $stmt = $conexao->prepare("INSERT INTO cadastro (nome, cpf, email) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $cpf);
            $stmt->bindParam(3, $email);
                if ($stmt->execute()) {
                    if ($stmt->rowCount() > 0) {
                       header("location:cadastro.php?sucesso=1");
                       exit;
                    } else { 
                        header("location:pagCadastro.php?erro=2");
                        exit;
                }}else {
                    throw new PDOException("Erro: Não foi possível executar a declaração sql");
                }
        } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de pacientes</title>
</head>
<body>
<?php 
 
    if(isset($_GET['sucesso'])){
        if($_GET['sucesso']==1){
             echo "<h3> Cadastro realizado com sucesso!.</h3> ";
        }}
?>
    <h2>Listagem de pacientes</h2>
    <table id="tabela_pacientes" border="1" width="100%">
        <tr>
            <th>Nome</th> 
            <th>E-mail</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>

        <?php
        require 'seguranca.php';

        try {
            $stmt = $conexao->prepare("SELECT * FROM cadastro");
            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->nome."</td> <td>".$rs->email."</td> <td>".$rs->cpf
                ."</td><td><center><a href=\"\">[Alterar]</a>"
                ."<a href=\"\">[Excluir]</a></center></td>";;
                echo "</tr>";
                }
            } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
            }
        } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
        }
    ?>
    </table>

    
</body>
</html>