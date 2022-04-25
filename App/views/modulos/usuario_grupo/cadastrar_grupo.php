<html>

<head>

    <title>Cadastrar Grupo de Usuários</title>
    <?php include PATH_VIEW . 'includes/css_config.php'; ?>
</head>

<body>
    <div id="global">
    
        <?php include PATH_VIEW . 'includes/cabecalho.php'; ?>

        <main class="container mt-3">

            <h4>
                Cadastro de Grupos de Usuários
            </h4>
            <form method="POST" action="/usuario/grupo/salvar">

                <div class="form-group">
                    <label>Descrição (Nome) do grupo:
                        <input name="descricao" class="form-control" value="<?= isset($dados_grupo) ? $dados_grupo->descricao : "" ?>" type="text" />
                    </label>
                </div>
                
                <?php if(isset($dados_grupo)): ?>
                    <input name="id" type="hidden" value="<?= $dados_grupo->id ?>" />
                    <a class="btn btn-danger" href="/usuario/grupo/excluir?id=<?= $dados_grupo->id ?>">
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