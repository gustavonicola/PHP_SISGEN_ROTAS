<html>
<head>    
    <title>Sistema</title>
    <?php include PATH_VIEW . 'includes/css_config.php'; ?>
</head>
<body>
    
    <?php include PATH_VIEW . 'includes/cabecalho.php'; ?>

    <main class="container mt-3">

        <?php if(isset($_GET['excluido'])): ?>
            <p> Categoria foi excluída </p>
        <?php endif ?>

        <h4>
            Lista de Categorias
        </h4>

        <table class="table table-hover mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Ações</th>
                    <th>ID</th>
                    <th>Descrição da Categoria </th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<$total_categorias; $i++): ?>
                <tr>
                    <td>
                        <a href="/categoria/ver?id=<?= $lista_categorias[$i]->id ?>">
                            Abrir
                        </a>
                    </td>
                    <td><?= $lista_categorias[$i]->id ?></td>
                    <td><?= $lista_categorias[$i]->descricao ?></td>
                </tr>
                <?php endfor ?>
            </tbody>
            </table>
    </main>
    
    <?php include PATH_VIEW . 'includes/rodape.php'; ?>
    <?php include PATH_VIEW . 'includes/js_config.php'; ?>

</body>
</html>

