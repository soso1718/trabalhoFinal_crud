<?php
require_once 'conexao.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
        $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
        $email = (isset($_POST["email"]) && $_POST["email"] != null) ? $_POST["email"] : "";
        $cpf = (isset($_POST["cpf"]) && $_POST["cpf"] != null) ? $_POST["cpf"] : "";}
    // }  else if (!isset($id)) {
    //     $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    //     $nome = NULL;
    //     $email = NULL;
    //     $cpf = NULL;
    // }

//     if ($id != NULL && $nome != NULL && $email != NULL && $cpf != NULL) {
//         try {
//             if ($id != "") {
//                 $stmt = $conexao->prepare("UPDATE cadastro SET nome=?, email=?, celular=?
//                 WHERE id = ?");
//                 $stmt->bindParam(4, $id);
//             } else {
//                 $stmt = $conexao->prepare("INSERT INTO cadastro (nome, cpf, email) VALUES (?, ?, ?)");
//                 $stmt->bindParam(1, $nome);
//                 $stmt->bindParam(2, $cpf);
//                 $stmt->bindParam(3, $email);
//                     if ($stmt->execute()) {
//                         if ($stmt->rowCount() > 0) {
//                             header("location:cadastro.php?sucesso=1");
//                             exit;
//                         } else { 
//                             header("location:pagCadastro.php?erro=2");
//                             exit;}
//                     }else {
//                         throw new PDOException("Erro: Não foi possível executar a declaração sql");}}
//     }catch (PDOException $erro) {
//         echo "Erro: " . $erro->getMessage();
//         }}
// ?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de pacientes</title>
</head>
<body>
<?php 
require_once 'seguranca.php';
    if(isset($_GET['sucesso'])){
        if($_GET['sucesso']==1){
            echo "<h3> Cadastro realizado com sucesso!.</h3> ";
        }elseif($_GET['sucesso']==2){
            echo "Paciente excluído com sucesso!";
        } else{
            echo "Atualização feita com sucesso!";
        }
    }
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
        try {
            $stmt = $conexao->prepare("SELECT * FROM cadastro");
            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->nome."</td><td>".$rs->email."</td><td>".$rs->cpf."</td>";
                echo "<td><center>";
                echo "<a href=\"http://localhost/trabalho_final_login/atualizaCadastro.php?id=".$rs->id."\">[Alterar]</a>";
                echo "<a href=\"http://localhost/trabalho_final_login/deleteCadastro.php?id=".$rs->id."\" onclick=\"return confirm('Tem certeza que deseja excluir esse paciente?')\">[Excluir]</a>" ;
                echo "</center></td>";
                echo "</tr>";
                }
            } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
            }
        } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
        }
    ?>

    <button><a href="http://localhost/trabalho_final_login/pagCadastro"> Cadastrar novo paciente </a></button>
    </table>

    
</body>
</html>