<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar cadastro</title>
</head>
<body>
    <form id="atualizar" action="atualizaCadastro.php" method="POST">
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

</body>
</html> -->