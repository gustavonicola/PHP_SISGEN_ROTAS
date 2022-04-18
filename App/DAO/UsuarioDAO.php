<?php
namespace App\DAO;

class UsuarioDAO extends DAO
{

    /**
     * Cria um novo objeto para fazer o CRUD dos Usuários
     */
    public function __construct()
    {
        parent::__construct();
    }    

    
    /**
     * Retorna um usuário específico
     */
    public function getMyUserById($id){

        $stmt = $this->conexao->prepare("SELECT id, nome, usuario, email FROM usuarios WHERE id = ?");        
        $stmt->bindValue(1, $id);
        $stmt->execute(); 
        
        return $stmt->fetchObject();

    }

    /**
     * Método para atualizar os dados do usuário
     */
    public function update($dados_usuario){
        
        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = sha1(?) WHERE id= ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_usuario['nome']);
        $stmt->bindValue(2, $dados_usuario['email']);
        $stmt->bindValue(3, $dados_usuario['senha']);
        $stmt->bindValue(4, $dados_usuario['id']);
        $stmt->execute();

    }

}