<html>
<head>    
    <title>Sistema</title>
    <?php include PATH_VIEW . 'includes/css_config.php'; ?>
</head>
<body>
    
    <?php include PATH_VIEW . 'includes/cabecalho.php'; ?>

    <main class="container mt-3">

        <?php if(isset($_GET['excluido'])): ?>
            <p> Grupo foi excluído </p>
        <?php endif ?>

        <h4>
            Lista de Grupo de Usuários
        </h4>

        <table class="table table-hover mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Ações</th>
                    <th>ID</th>
                    <th>Descrição </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_grupos as $g): ?>
                <tr>
                    <td>
                        <a href="/usuario/grupo/ver?id=<?= $g->id ?>">
                            Abrir
                        </a>
                    </td>
                    <td><?= $g->id ?></td>
                    <td><?= $g->descricao ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
            </table>
    </main>
    
    <?php include PATH_VIEW . 'includes/rodape.php'; ?>
    <?php include PATH_VIEW . 'includes/js_config.php'; ?>

</body>
</html>

