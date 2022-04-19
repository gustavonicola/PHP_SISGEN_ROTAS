<?php

namespace App\Controller;

use App\DAO\loginDAO;
use Exception;

class LoginController extends Controller {

    public static function login()
    {
        $usuario = (isset($_COOKIE['sisgen_user'])) ? $_COOKIE['sisgen_user'] : '';

        include PATH_VIEW . 'login.php';
    }

    public static function esqueciSenha(){

        include PATH_VIEW . 'esqueci-senha.php';

    }

    public static function enviarNovaSenha(){

        try {

            // Gera uma nova senha
            $nova_senha = uniqid();

            // Pega o e-mail digitado
            $email = $_POST['email'];

            // Altera no banco a senha se o e-mail for válido no cadastro de usuário
            $login_dao = new loginDAO();
            $login_dao->setNewPasswordForUserByEmail($email, $nova_senha);

            // Envia por e-mail a nova senha
            $assunto = "Nova senha do Sistema";
            $mensagem = "Sua nova senha é: ". $nova_senha;

            $retorno = "Caso seu e-mail esteja em nosso sistema você acaba de receber uma nova senha.";

            $saida_email = mail($email, $assunto, $mensagem, "From: mundomeubebe@gmail.com");

            if(!$saida_email){
                //$teste = "Senha gerada: " . $nova_senha;
                throw new Exception("Desculpe, ocorreu um erro ao enviar o e-mail. ");
            }

        } catch (Exception $e) {

            $retorno= $e->getMessage();

        } 

        include PATH_VIEW . 'esqueci-senha.php';

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

    public static function updateNameOfCurrentUser($name)
    {
        $_SESSION['usuario_logado']['nome'] = $name;
    }


    public static function getIdOfCurrentUser()
    {
        return $_SESSION['usuario_logado']['id'];
    }

    

}