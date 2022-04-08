<?php

class ProdutoController extends Controller {

    public static function index()
    {
        // Executa a função isProtected que está no arquivo Controller para verificar se o usuário está logado
        parent::isProtected();
        
        $produto_dao = new ProdutoDAO();
        $lista_produtos = $produto_dao->getAllRows();
        $total_produtos = count($lista_produtos);

        include 'views/modulos/produto/listar_produtos.php';
    }

    public static function ver()
    {
        // Executa a função isProtected que está no arquivo Controller para verificar se o usuário está logado
        parent::isProtected();
        
        if(isset($_GET['id'])){
                
            $produto_dao = new ProdutoDAO();
            $dados_produto = $produto_dao->getById($_GET['id']);
            include 'views/modulos/produto/cadastrar_produto.php';
        
        } else {
            
            header("Location: /produto");

        }
    }

    public static function cadastrar()
    {
        
        // Executa a função isProtected que está no arquivo Controller para verificar se o usuário está logado
        parent::isProtected();

        /**
         * Obtendo as Categorias
         */
        $categoria_dao = new CategoriaDAO();
        $lista_categorias = $categoria_dao->getAllRows();
        $total_categorias = count($lista_categorias);

        
        /**
         * Obtendo as Marcas
         */
        $marca_dao = new MarcaDAO();
        $lista_marcas = $marca_dao->getAllRows();
        $total_marcas = count($lista_marcas);
        
        include 'views/modulos/produto/cadastrar_produto.php';
    }

    public static function salvar()
    {
        // Executa a função isProtected que está no arquivo Controller para verificar se o usuário está logado
        parent::isProtected();
        
        $produto_dao = new ProdutoDAO();
        
        $dados_para_salvar = array(
            'id_marca' => $_POST["id_marca"],
            'id_categoria' => $_POST["id_categoria"],
            'descricao' => $_POST["descricao"],
            'preco' => $_POST["preco"]
        );        

        // Se o campo oculto id estiver preenchido, deverá atualizar a informação senão insere um novo registro
        if(isset($_POST['id'])){

            $dados_para_salvar['id'] = $_POST["id"];

            $produto_dao->update($dados_para_salvar);            

        } else {
        
            $produto_dao->insert($dados_para_salvar);            

        }

        header("Location: /produto");
    }

    public static function excluir()
    {
        // Executa a função isProtected que está no arquivo Controller para verificar se o usuário está logado
        parent::isProtected();
        
        $produto_dao = new ProdutoDAO();
        $dados_produto = $produto_dao->delete($_GET['id']);
        
        header("Location: /produto");
    }


}