<?php
/**
 * @var \CodeIgniter\View\View $this
 * @var array $materias 
 * @var array $grados 
 */
$this->extend('main_template');
?>
<?php $this->section('content')?>

<?php if(isset($validation)):?>

<?= $validation->ListErrors()?>
<?php endif;?>

<?= form_open(current_url(),['method'=> 'post'])?>
<div class="form-group">
<div class="form-group">
    <?= form_label('Materias','mxg_id_mat',[
        'for' => 'mxg_id_mat',
        'class' => 'control-label'
    ]) ?>
    <?= form_dropdown('mxg_id_mat', $materias);?>
    <?php print_r($materias)?>
    
</div>
<br>
<div class="form-group">
    <?= form_label('Grados','mxg_id_grd',[
        'for' => 'mxg_id_grd',
        'class' => 'control-label'
    ]) ?>
    <?= form_dropdown('mxg_id_grd', $grados);?>
</div>
</div>
<br>
<?= form_submit('submit', 'Crear',[
        'class' => 'btn btn-primary'
])?>
<?= form_close()?>
<?php $this->endSection(); ?>