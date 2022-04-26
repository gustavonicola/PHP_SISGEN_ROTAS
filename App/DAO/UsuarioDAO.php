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
     * Método para listar todos os registros da tabela de usuários
     */
    public function getAllRows()
    {
        $sql = "SELECT u.id, u.nome, u.email, g.descricao AS grupo
                FROM usuarios u
                JOIN grupos g ON (g.id = u.id_grupo)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); 

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
        
    }

    /**
     * Retorna um registro específico da tabela de usuarios
     */
    public function getById($id)
    {

        $stmt = $this->conexao->prepare("SELECT * FROM usuarios WHERE id = ?");        
        $stmt->bindValue(1, $id);
        $stmt->execute(); 
        
        return $stmt->fetchObject();

    }

    /**
     * Método para inserir um usuário na tabela usuarios
     */
    public function insert($dados)
    {

        $sql = "INSERT INTO usuarios (nome, email, usuario, id_grupo) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados['nome']);
        $stmt->bindValue(2, $dados['email']);
        $stmt->bindValue(3, $dados['usuario']);
        $stmt->bindValue(4, $dados['id_grupo']);
        $stmt->execute();

    }

    /**
     * Método para atualizar os dados do usuário
     */
    public function update($dados_usuario)
    {
        
        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = sha1(?), usuario = ? WHERE id= ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_usuario['nome']);
        $stmt->bindValue(2, $dados_usuario['email']);
        $stmt->bindValue(3, $dados_usuario['senha']);
        $stmt->bindValue(4, $dados_usuario['usuario']);
        $stmt->bindValue(5, $dados_usuario['id']);
        $stmt->execute();

    }

    /**
     * Método para excluir um usuário do banco de dados
     */
    public function delete($id)
    { 

        $sql = "DELETE FROM usuarios WHERE id= ?";

        $stmt = $this->conexao->prepare($sql);        
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }
    
    /**
     * Retorna um usuário específico
     */
    public function getMyUserById($id)
    {

        $stmt = $this->conexao->prepare("SELECT id, nome, usuario, email FROM usuarios WHERE id = ?");        
        $stmt->bindValue(1, $id);
        $stmt->execute(); 
        
        return $stmt->fetchObject();

    }

    public function checkUserByIdAndPassword($id, $senha)
    {
        $stmt = $this->conexao->prepare("SELECT id FROM usuarios WHERE id = ? AND senha = sha1(?)");
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function checkDuplicateEmail($email, $id_usuario)
    {
        $stmt = $this->conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bindValue(1, $email);        
        $stmt->execute();

        $dados = $stmt->fetchObject();

        //caso retorne um id, verificar se o id pertence ao próprio usuario que está sendo editado.
        //Se pertercer a outro usuário, acusará e-mail já vinculado a outro usuário.
        if(is_object($dados))
        {
            if($id_usuario == $dados->id)
                return false;
            else
                return true;
        } else
            return false;        
    }

    public function checkDuplicateUsuario($usuario, $id_usuario)
    {
        $stmt = $this->conexao->prepare("SELECT id FROM usuarios WHERE usuario = ?");
        $stmt->bindValue(1, $usuario);
        $stmt->execute();

        $dados = $stmt->fetchObject();

        //caso retorne um id, verificar se o id pertence ao próprio usuario que está sendo editado.
        //Se pertercer a outro usuário, acusará que o usuário já é vinculado a outro usuário.
        if(is_object($dados))
        {
            if($id_usuario == $dados->id)
                return false;
            else
                return true;
        } else
            return false;  
    }    

}