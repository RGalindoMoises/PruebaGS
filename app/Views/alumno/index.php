<?php
/**
 * @var array $materias
 * @var \CodeIgniter\Pager\Pager $pager
 * @var \CodeIgniter\View\View $this
 */
$this->extend('main_template');
?>
<?php $this->section('content')?>
<div class="text-right">
    <a href="<?= site_url(['materia','addMateria'])?>" class="btn btn-primary mb-3 mr-3">Nueva Materia</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materias as $materia):?>
                <tr>
                    <td><?= esc($materia['mat_id']);?></td>
                    <td><?= esc($materia['mat_nombre']);?></td>
                    
                    <td class="text-right">
                        <a href="<?= site_url(['materia','editMateria',$materia['mat_id']])?>" class="btn btn-primary mb-3 mr-3">Editar</a>
                        <a href="<?= site_url(['materia','deleteMateria',$materia['mat_id']])?>" class="btn btn-warning mb-3 mr-3">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
    <div>
        <?= $pager->Links();?>
    </div>
<?php $this->endSection(); ?>