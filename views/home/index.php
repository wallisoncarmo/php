<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Principal</a>
    </li>
</ol>


<div class="row">
    
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-user"></i>
                </div>
                <div class="mr-5"><?= $viewmodel["user"] ?> Total de Usuário</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?= ROOT_URL ?>user">
                <span class="float-left">Ver mais</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-lock"></i>
                </div>
                <div class="mr-5"><?= $viewmodel["admin"] ?> Administrador</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?= ROOT_URL ?>user">
                <span class="float-left">Ver mais</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-support"></i>
                </div>
                <div class="mr-5"><?= $viewmodel["profile"] ?> Perfis</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?= ROOT_URL ?>profile">
               <span class="float-left">Ver mais</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>