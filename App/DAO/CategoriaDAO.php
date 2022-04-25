<?php

namespace App\DAO;


class CategoriaDAO extends DAO {

        
    /**
     * Cria um novo objeto para fazer o CRUD de Categorias
     */
    public function __construct()
    {
        parent::__construct();
    }
    
        
    /**
     * Método para listar todos os registros da tabela categoria
     */
    public function getAllRows(){

        $stmt = $this->conexao->prepare("SELECT * FROM categoria");        
        $stmt->execute(); 
        
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    
    /**
     * Retorna um registro específico da tabela categoria
     */
    public function getById($id){

        $stmt = $this->conexao->prepare("SELECT * FROM categoria WHERE id = ?");        
        $stmt->bindValue(1, $id);
        $stmt->execute(); 
        
        return $stmt->fetchObject();

    }

    
    /**
     * Método para inserir uma categoria na tabela categoria
     */
    public function insert($dados_categoria){

        $sql = "INSERT INTO categoria (descricao) VALUES (?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_categoria['descricao']);
        $stmt->execute();

    }


    /**
     * Método para atualizar a categoria no banco de dados
     */
    public function update($dados_categoria){
        
        $sql = "UPDATE categoria SET descricao = ? WHERE id= ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_categoria['descricao']);
        $stmt->bindValue(2, $dados_categoria['id']);
        $stmt->execute();

    }

    
    /**
     * Método para excluir a categoria do banco de dados
     */
    public function delete($id){ 

        $sql = "DELETE FROM categoria WHERE id= ?";

        $stmt = $this->conexao->prepare($sql);        
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }


}