<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?>

<?php echo $titulo; ?>

<?php echo $this->endSection(); ?>


<?php echo $this->section('estilos'); ?>



<!-- aqui enviamos para o template principal os estilos -->

<?php echo $this->endSection(); ?>


<?php echo $this->section('conteudo'); ?>


<div class="row">

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-header bg-primary pb-0 pt-4 align-content-md-center">

                <h4 class="card-title text-white"><?php echo esc( $titulo ) ?></h4>

            </div>
            <div class="card-body">

                <p class="card-text">
                    <span class="font-weight-bold">Nome:</span>
                    <?php echo esc( $usuario->name ); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">E-Mail:</span>
                    <?php echo esc( $usuario->email ); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Ativo:</span>
                    <?php echo $usuario->ativo ? 'Sim' : 'Não'; ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Perfil:</span>
                    <?php echo $usuario->id_admin ? 'Administrador' : 'Cliente'; ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Criado:</span>
                    <?php echo $usuario->criado_em->humanize(); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Atualizado:</span>
                    <?php echo $usuario->atualizado_em->humanize(); ?>
                </p>
                
            </div>
            <div class="mt-4">

                <a href="<?php echo site_url("admin/usuarios/editar/$usuario->id"); ?>" class="btn btn-dark btn-sm mr-2"  >
                    <i class="mdi mdi-pencil btn-icon-prepend"></i>
                   Editar
                </a>
                <a href="<?php echo site_url("admin/usuarios/excluir/$usuario->id"); ?>" class="btn btn-danger btn-sm mr-2"  >
                    <i class="mdi mdi-trash btn-icon-prepend"></i>
                    Excluir
                </a>
                <a href="<?php echo site_url("admin/usuarios"); ?>" class="btn btn-light text-dark btn-sm "  >
                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i>
                    Voltar
                </a>

            </div>
        </div>
    </div>
</div>



<!-- aqui enviamos para o template principal os scripts -->

<?php echo $this->endSection(); ?>



<?php echo $this->section('scripts'); ?>

<?php echo $this->endSection(); ?>

