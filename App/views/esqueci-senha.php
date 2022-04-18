<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Esqueci a senha</title>
    <?php include PATH_VIEW . 'includes/css_config.php'; ?>
    <meta charset="UTF-8">
</head>

<body>
    <div id="global">
        <header class="container mt-3">
            <div class="row mb-3">
                <div class="col-md-9">
                    <h1>
                        SISGEN
                        <small>Sistema de Gestão</small>
                    </h1>
                </div>                
            </div>

            <main>
                <div style="margin:0 auto; max-width:40%">
                    <form method="POST" action="/enviar-nova-senha">
                        
                        <?php if(isset($retorno)): ?>
                        <div class="alert alert-primary" role="alert">
                            <?=  $retorno ?>
                        </div>
                        <?php endif ?>
                        
                        <div class="form-group">
                            <label for="email">E-mails:</label>
                            <input id="email" name="email" class="form-control" type="email" />                        
                        </div>                              

                        <button class="btn btn-success" type="submit">Enviar nova Senha</button>
                        <a href="/login" class="btn">Voltar</a>
                        
                    </form>
                </div>
            </main>

            <footer class="container mt-5">

                <div class="text-center">
                    <p>
                        SISGEN - Sistema de Gestão - Todos os direitos reservados
                    </p>

                    <p>
                        Programação web com @prof.tiagotas
                    </p>
                </div>


            </footer>
    </div>
    <?php include PATH_VIEW . 'includes/js_config.php'; ?>
</body>

</html>