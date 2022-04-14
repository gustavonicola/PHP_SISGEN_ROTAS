<?php

namespace App\Controller;

use App\DAO\loginDAO;


class LoginController extends Controller {

    public static function login()
    {
        $usuario = (isset($_COOKIE['sisgen_user'])) ? $_COOKIE['sisgen_user'] : '';

        include PATH_VIEW . 'login.php';
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

            if(isset($_POST['remember'])){
                self::remember($usuario);
            }
                
            
                header("Location: /");
        
        } else {
            
            header("Location: /login?fail=true");

        }


    }

    private static function remember($user){
        $validade = strtotime("+1 month");
        setcookie("sisgen_user", $user, $validade, "/", "", false, true);

    }

    private static function forget(){
        $validade = time() -3600;
        setcookie("sisgen_user", "", $validade, "/", "", false, true);
    }

    public static function sair()
    {
        // destroi o cookie
        self::forget();
        
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