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

                <?php if($model->hasValidationsErrors()): ?>
                    <div class="alert alert-danger" role="alert">
                        
                        <?php foreach($model->getValidationsErrors() as $error):

                            echo $error . "<br />";

                        endforeach; ?>
                    </div>

                <?php endif; ?>                

                <form method="POST" action = "/produto/salvar">
                    
                    <div class="form-group">
                        <label for="descricao">Descrição (Nome) do produto:</label>
                        <input name="descricao" id="descricao" class="form-control" value="<?= $model->descricao ?>" type="text" />                        
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id">Preço:</label>
                            <input name="preco" id="preco" class="form-control" value="<?= $model->preco ?>" type="number" />                            
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
                                <option value="">Selecione a categoria</option>
                                
                                <?php 
                                    foreach($model->lista_categorias as $categoria):                                
                                    
                                        $selecionado = ($categoria->id == $model->id_categoria) ? "selected" : "";                                    
                                ?>
                                    
                                    <option value="<?= $categoria->id ?>" <?=  $selecionado ?>>
                                        <?= $categoria->descricao ?>
                                    </option>
                                
                                    <?php endforeach ?>
                            </select>                            
                        </div>
                        
                            <div class="form-group col-md-6">
                                <label for="id_marca">Marca</label>
                                <select name="id_marca" id="id_marca" class="form-control">
                                    <option value="">Selecione a marca</option>
                                    
                                    <?php 
                                    
                                    foreach($model->lista_marcas as $marca):
                                        
                                        $selecionado = ($marca->id == $model->id_marca) ? "selected" : "";                                        
                                    ?>
                                        
                                        <option value="<?= $marca->id ?>" <?= $selecionado ?>>
                                            <?= $marca->descricao ?>
                                        </option>
                                    
                                        <?php endforeach ?>
                                </select>                                
                            </div>                        
                    </div>

                    <?php if($model->id !== null): ?>
                    <input name="id" type="hidden" value="<?= $model->id ?>" />
                    <a class="btn btn-danger" href="/produto/excluir?id=<?= $model->id ?>">
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