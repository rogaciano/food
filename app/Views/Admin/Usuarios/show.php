<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?>

<?php echo $titulo; ?>

<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>

<!-- aqui enviamos para o template principal os estilos -->


<?php echo $this->endSection(); ?>


<?php echo $this->section('conteudo'); ?>


<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $titulo ?></h4>

                <div class="table-responsive">

                </div>
            </div>
        </div>
    </div>


</div>


<!-- aqui enviamos para o template principal os scripts -->

<?php echo $this->endSection(); ?>



<?php echo $this->section('scripts'); ?>

<?php echo $this->endSection(); ?>

