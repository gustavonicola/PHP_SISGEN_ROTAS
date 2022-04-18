<?php

namespace App\DAO;


class LoginDAO extends DAO
{    
    
    public function __construct()
    {        

        parent::__construct();

    }

    public function setNewPasswordForUserByEmail($email, $newPassword)
    {
        $sql = "UPDATE usuarios SET senha = sha1(?) WHERE email=?";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $newPassword);
        $stmt->bindValue(2, $email);
        $stmt->execute();

    }

    
    public function getUserByUserAndPass($usuario, $senha)
    {
        $sql = "SELECT id, nome FROM usuarios WHERE usuario = ? AND senha = sha1(?)";    

        $stmt = $this->conexao->prepare($sql);        
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, $senha);
        $stmt->execute(); 
        
        return $stmt->fetchObject();

    }

}
