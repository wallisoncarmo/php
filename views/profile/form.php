<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= ROOT_URL ?>profile">Perfis</a>
    </li>
    <li class="breadcrumb-item">
        <a href="#">Formulário</a>
    </li>
</ol>



<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <i class="fa fa-user"></i> Gerencia de Usuário [<?= isset($viewmodel['profile']['id']) ? "Edição" : "Cadastro" ?>]
            </div>    
        </div>            
    </div>

    <div class="card-body">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="profile">Perfil:</label>
                        <input class="form-control" id="username" value="<?= isset($viewmodel['profile']['profile']) ? $viewmodel['profile']['profile'] : '' ?>" name="profile" type="text" placeholder="Nome do perfil" required>
                    </div>
                </div>
            </div>          

            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary" name="submit" type="submit" value="Entrar" ><?= isset($viewmodel['profile']['id'])  ? "Editar" : "Cadastrar" ?></button>
                </div>    
                <div class="col-md-6">
                    <a class="btn btn-success pull-right" href="<?= ROOT_URL ?>profile" >Voltar</a>
                </div>    
            </div>   

        </form>        
    </div>

</div>

