<?php
/**
 * @var array $grados
 * @var \CodeIgniter\Pager\Pager $pager
 * @var \CodeIgniter\View\View $this
 */
$this->extend('main_template');
?>
<?php $this->section('content')?>
<div class="text-right">
    <a href="<?= site_url(['grado','addGrado'])?>" class="btn btn-primary mb-3 mr-3">Nuevo Grado</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grados as $grado):?>
                <tr>
                    <td><?= esc($grado['grd_id']);?></td>
                    <td><?= esc($grado['grd_nombre']);?></td>
                    
                    <td class="text-right">
                        <a href="<?= site_url(['grado','editGrado',$grado['grd_id']])?>" class="btn btn-primary mb-3 mr-3">Editar</a>
                        <a href="<?= site_url(['grado','deleteGrado',$grado['grd_id']])?>" class="btn btn-warning mb-3 mr-3">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
    <div>
        <?= $pager->Links();?>
    </div>
<?php $this->endSection(); ?>