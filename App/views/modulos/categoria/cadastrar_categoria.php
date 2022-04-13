<html>

<head>

    <title>Cadastrar Categoria</title>
    <?php include PATH_VIEW . 'includes/css_config.php'; ?>
</head>

<body>
    <div id="global">
    
        <?php include PATH_VIEW . 'includes/cabecalho.php'; ?>

        <main class="container mt-3">

            <h4>
                Cadastro de Categoria
            </h4>
            <form method="POST" action="/categoria/salvar">

                <div class="form-group">
                    <label>Descrição (Nome) da categoria:
                        <input name="descricao" class="form-control" value="<?= isset($dados_categoria) ? $dados_categoria->descricao : "" ?>" type="text" />
                    </label>
                </div>
                
                <?php if(isset($dados_categoria)): ?>
                    <input name="id" type="hidden" value="<?= $dados_categoria->id ?>" />
                    <a class="btn btn-danger" href="/categoria/excluir?id=<?= $dados_categoria->id ?>">
                        Excluir
                    </a>
                <?php endif ?>

                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </main>
        
        <?php include PATH_VIEW . 'includes/rodape.php'; ?>
        <?php include PATH_VIEW . 'includes/js_config.php'; ?>

    </div>
</body>

</html>