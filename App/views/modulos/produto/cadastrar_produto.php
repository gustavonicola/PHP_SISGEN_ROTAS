<html>
    <head>
        <title>Cadastro de Produtos</title>
        <?php include PATH_VIEW . 'includes/css_config.php'; ?>
        
    </head>

    <body>

            <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

            <main class="container mt-3">

                <h4>
                    Cadastro de Produto
                </h4>
                <form method="POST" action = "/produto/salvar">
                    
                    <div class="form-group">
                        <label for="descricao">Descrição (Nome) do produto:</label>
                        <input name="descricao" id="descricao" class="form-control" value="<?= isset($dados_produto) ? $dados_produto->descricao : "" ?>" type="text" />                        
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id">Preço:</label>
                            <input name="preco" id="preco" class="form-control" value="<?= isset($dados_produto) ? $dados_produto->preco : "" ?>" type="number" />                            
                        </div>

                        <div class="form-group col-md-6">
                            <label for="foto">Foto:</label>
                            <input name="foto" id="foto" class="form-control-file" type="file" />                            
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_categoria">Categoria</label>
                            <select name="id_categoria" id="id_categoria" class="form-control">
                                <option>Selecione a categoria</option>
                                
                                <?php 
                                
                                for($i=0; $i<$total_categorias; $i++): 
                                    
                                    $selecionado = "";
                                    
                                    if(isset($dados_produto->id)){
                                        $selecionado = ($lista_categorias[$i]->id == $dados_produto->id_categoria) ? "selected" : "";
                                    }                                    
                                    
                                ?>
                                    
                                    <option value="<?= $lista_categorias[$i]->id ?>" <?=  $selecionado ?>>
                                        <?= $lista_categorias[$i]->descricao ?>
                                    </option>
                                
                                    <?php endfor ?>
                            </select>                            
                        </div>
                        
                            <div class="form-group col-md-6">
                                <label for="id_marca">Marca</label>
                                <select name="id_marca" id="id_marca" class="form-control">
                                    <option>Selecione a marca</option>
                                    
                                    <?php 
                                    
                                    for($i=0; $i<$total_marcas; $i++): 
                                    
                                        $selecionado = "";

                                        if(isset($dados_produto->id)){
                                            $selecionado = ($lista_marcas[$i]->id == $dados_produto->id_marca) ? "selected" : "";
                                        }
                                    ?>
                                        
                                        <option value="<?= $lista_marcas[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_marcas[$i]->descricao ?>
                                        </option>
                                    
                                        <?php endfor ?>
                                </select>                                
                            </div>                        
                    </div>

                    <?php if(isset($dados_produto)): ?>
                    <input name="id" type="hidden" value="<?= $dados_produto->id ?>" />
                    <a class="btn btn-danger" href="/produto/excluir?id=<?= $dados_produto->id ?>">
                        Excluir
                    </a>
                <?php endif ?>

                    <button class="btn btn-success" type="submit">Salvar</button>

                </form>
            </main>
            
            <?php include PATH_VIEW . 'includes/rodape.php' ?>
            <?php include PATH_VIEW . 'includes/js_config.php'; ?>

        </body>
</html>