<?php

namespace App\DAO;


class UsuarioGrupoDAO extends DAO {

        
    /**
     * Cria um novo objeto para fazer o CRUD de Grupos
     */
    public function __construct()
    {
        parent::__construct();
    }
    
        
    /**
     * Método para listar todos os registros da tabela grupos de usuários
     */
    public function getAllRows(){

        $stmt = $this->conexao->prepare("SELECT * FROM grupos");        
        $stmt->execute(); 

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
        
    }

    
    /**
     * Retorna um registro específico da tabela grupo de usuarios
     */
    public function getById($id){

        $stmt = $this->conexao->prepare("SELECT * FROM grupos WHERE id = ?");        
        $stmt->bindValue(1, $id);
        $stmt->execute(); 
        
        return $stmt->fetchObject();

    }

    
    /**
     * Método para inserir um grupo de usuário na tabela grupos
     */
    public function insert($dados){

        $sql = "INSERT INTO grupos (descricao, cadastrar, editar, listar, excluir) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados['descricao']);
        $stmt->bindValue(2, $dados['cadastrar']);
        $stmt->bindValue(3, $dados['editar']);
        $stmt->bindValue(4, $dados['listar']);
        $stmt->bindValue(5, $dados['excluir']);

        $stmt->execute();

    }


    /**
     * Método para atualizar o grupo de usuário no banco de dados
     */
    public function update($dados){
        
        $sql = "UPDATE grupos SET descricao = ?, cadastrar = ?, editar = ?, listar = ?, excluir = ? WHERE id= ?";

        $stmt = $this->conexao->prepare($sql);        
        $stmt->bindValue(1, $dados['descricao']);
        $stmt->bindValue(2, $dados['cadastrar']);
        $stmt->bindValue(3, $dados['editar']);
        $stmt->bindValue(4, $dados['listar']);
        $stmt->bindValue(5, $dados['excluir']);
        $stmt->bindValue(6, $dados['id']);
        $stmt->execute();

    }

    
    /**
     * Método para excluir um grupo de usuário do banco de dados
     */
    public function delete($id){ 

        $sql = "DELETE FROM grupos WHERE id= ?";

        $stmt = $this->conexao->prepare($sql);        
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }


}