<?php
/**
 * @var \CodeIgniter\View\View $this
 * @var array $entity 
 */
$this->extend('main_template');
?>
<?php $this->section('content')?>

<?php if(isset($validation)):?>

<?= $validation->ListErrors()?>
<?php endif;?>

<?= form_open(current_url(),['method'=> 'post'])?>
<div class="form-group">
    <?= form_label('Nombre','grd_nombre',[
        'for' => 'grd_nombre',
        'class' => 'control-label'
    ]) ?>
    <?= form_input('grd_nombre',esc($entity['grd_nombre']),[
        'class' => 'form-control'
    ])?>
</div>
<br>
<?= form_submit('submit', 'Actualizar',[
        'class' => 'btn btn-primary'
])?>
<?= form_close()?>
<?php $this->endSection(); ?>