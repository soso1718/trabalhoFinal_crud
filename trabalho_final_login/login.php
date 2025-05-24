 <?php
    session_start();

    if((isset($_POST["email"]) AND $_POST["email"] != null) AND (isset($_POST["senha"]) AND $_POST["senha"] != null)){
        require 'conexao.php';
        require 'UsuarioClass.php';

        $u = new Usuario();
        
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        
        if($u->login($email, $senha) == true){
            if(isset($_SESSION['idusuario'])){
                header("location: pagPrincipal.php");
            }else{
                header("location: index.php");}
        }else{
            header("location: index.php?erro=1");
            exit;
        } 
        
    }else{
        $email = null;
        $senha = null;
        header("location: index.php");
        exit;
    }
?>