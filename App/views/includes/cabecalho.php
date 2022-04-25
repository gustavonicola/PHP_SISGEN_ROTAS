<?php
    use App\Controller\LoginController;

    $usuario = LoginController::getNameOfCurrentUser();
    $grupo =  LoginController::getGroupOfCurrentUser();
?>
<header class="container mt-3">
    <div class="row mb-3">
        <div class="col-md-7">
            <h1>
                SISGEN
                <small>Sistema de Gestão</small>
            </h1>
        </div>

        <div class="col-sm-5">
            <fieldset>
                <legend>Dados do Usuário</legend>
                    Bem-vindo 
                    <strong>
                        <a href="/usuario/meus-dados" class="btn btn-default">
                            <?= $usuario ?>
                        </a>                        
                    </strong>                    
                        Grupo: <?= $grupo ?> 
                        <br />
                    
                    <a href="/usuario/grupo/cadastrar" class="btn btn-default">
                        Novo Grupo de Usuários
                    </a>

                    <a href="/usuario/grupo" class="btn btn-default">
                        Lista de Grupos de Usuários
                    </a>


                    <a class="btn btn-dark" href="/sair">Sair</a>
            </fieldset>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!--<a class="navbar-brand" href="#">Navbar</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Tela Inicial</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categoria
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/categoria/cadastrar">Cadastrar Categoria</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/categoria">Listar Categorias</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marca
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Cadastrar Marca</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Listar Marcas</a>                    
                        
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Produto
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/produto/cadastrar">Cadastrar Produto</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/produto">Listar Produtos</a>
                        
                    </div>
                </li>

            </ul>
        </div>
    </nav>    
</header>