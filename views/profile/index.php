<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= ROOT_URL ?>profile">Usuários</a>
    </li>
</ol>

<!-- Example DataTables Card-->
<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <i class="fa fa-table"></i> Data Table Example
            </div>                
            <div class="col-md-4">
                <input class="form-control" id="search" type="text" placeholder="Buscar pelo perfil...">

            </div>            
        </div>            
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Perfil</th>
                        <th>Criação</th>
                        <th>Update</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($viewmodel as $key => $value) { ?>
                        <tr id="<?= $value['id'] ?>">
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['profile'] ?></td>
                            <td><?= convertDataEN($value['dt_create']) ?></td>
                            <td><?= convertDataEN($value['dt_update']) ?></td>
                            <td>
                                <a class="btn btn-warning edit" href="<?= ROOT_URL ?>profile/form/<?= $value['id'] ?>" ><i class="fa fa-fw fa-pencil"></i></a>
                                <button type="button" class="btn btn-danger delete" data-id="<?= $value['id'] ?>"><i class="fa fa-fw fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-success" href="<?= ROOT_URL ?>profile/form">Cadastro</a>
            </div>
        </div>
    </div>
    <div class="card-footer small text-muted">Ultima atualização <?= date("d/m/Y á\s H:i"); ?></div>
</div>


<!-- Custom scripts for this page-->
<script src="<?= ROOT_URL ?>assets/js/sb-admin-datatables.js"></script>
<!--<script src="<?= ROOT_URL ?>assets/js/sb-admin-charts.min.js"></script>-->       

<!-- Data table-->            
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/buttons.flash.min.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/jszip.min.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/pdfmake.min.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/vfs_fonts.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/buttons.html5.min.js"></script>
<script src="<?= ROOT_URL ?>assets/vendor/datatables/js/buttons.print.min.js"></script>


<script>

    $('.delete').click(function () {

        if (!confirm("Você deseja deletar a equipamento #" + $(this).data("id") + "?")) {
            return;
        }

        $.ajax({
            type: "GET",
            url: ROOT_URL+"profile/json-delete/" + $(this).data("id"),
            dataType: 'json',
            async: false,
            success: function (response) {
            }
        });

        $('#' + $(this).data("id")).remove();
        $('#message').append('<div class="alert alert-success"> O registro #' + $(this).data("id") + ' foi removido com sucesso</div>');


    });


</script>