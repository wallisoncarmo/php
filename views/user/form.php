<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= ROOT_URL ?>user">Usuários</a>
    </li>
    <li class="breadcrumb-item">
        <a href="#">Formulário</a>
    </li>
</ol>



<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <i class="fa fa-user"></i> Gerencia de Usuário [<?= isset($viewmodel['user']['id']) ? "Edição" : "Cadastro" ?>]
            </div>    
        </div>            
    </div>

    <div class="card-body">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="username">Usuário:</label>
                        <input class="form-control" id="username" value="<?= isset($viewmodel['user']['username']) ? $viewmodel['user']['username'] : '' ?>" name="username" type="email" aria-describedby="emailHelp" placeholder="Informe seu E-mail" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input class="form-control" id="password" value="<?= isset($viewmodel['user']['password']) ? $viewmodel['user']['password'] : '' ?>" name="password" type="password" aria-describedby="emailHelp" placeholder="Informe a senha" <?= isset($viewmodel['permissoes']['acesso']) ? "required" : "" ?>>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="profile_id">Perfil:</label>     
                        <select class="form-control" id="profile_id" name="profile_id">
                            <option>-- Selecione --</option>
                            <?php
                            if (isset($viewmodel["profiles"])) {
                                foreach ($viewmodel["profiles"] as $key => $value):
                                    ?>
                                    <option 
                                    <?php
                                    if (isset($viewmodel['user']['profile_id'])) {
                                        if ($viewmodel['user']['profile_id'] == $value['id'])
                                            echo 'selected';
                                    }
                                    ?>
                                        value="<?= $value['id'] ?>"><?= $value['profile'] ?></option>
                                        <?php
                                    endforeach;
                                }
                                ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary" name="submit" type="submit" value="Entrar" ><?= isset($viewmodel['user']['id'])  ? "Editar" : "Cadastrar" ?></button>
                </div>    
                <div class="col-md-6">
                    <a class="btn btn-success pull-right" href="<?= ROOT_URL ?>user" >Voltar</a>
                </div>    
            </div>   


        </form>        
    </div>

</div>

