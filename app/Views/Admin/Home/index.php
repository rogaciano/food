<?php echo $this->extend('Admin/layout/principal'); ?>


<?php echo $this->section('titulo'); ?>

<?php echo $titulo; ?>


<?php echo $this->endSection(); ?>


<?php echo $this->section('estilos'); ?>

<!-- aqui enviamos para o template principal os estilos -->

<?php echo $this->endSection(); ?>



<?php echo $this->section('conteudo'); ?>

<!-- aqui enviamos para o template principal os conteudos -->

<?php echo $titulo; ?>

<?php echo $this->endSection(); ?>



<?php echo $this->section('scripts'); ?>

<?php echo $titulo; ?>

<?php echo $this->endSection(); ?>

