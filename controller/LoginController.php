<?php

class LoginController extends Controller {

    public static function login()
    {
        include 'views/login.php';
    }

    public static function autenticar()
    {
        $usuario = $_POST["user"];
        $senha = $_POST["pass"];
        
        $login_dao = new LoginDAO();
                
        $resultado = $login_dao->getUserByUserAndPass($usuario, $senha);

        if($resultado !== false)
        {
            
            $_SESSION["usuario_logado"] = array('id'=>$resultado->id, 'nome'=>$resultado->nome);
            header("Location: /");
        
        } else {
            
            header("Location: /login?fail=true");

        }


    }

    public static function sair()
    {
        // destroi a sessão
        unset($_SESSION["usuario_logado"]);
        
        //verifica se o usuário está logado, como não estará redireciona para o login
        parent::isProtected();        
    }

    public static function getNameOfUser()
    {
        return $_SESSION['usuario_logado']['nome'];
    }

    

}