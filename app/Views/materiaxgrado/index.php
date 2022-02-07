<?php
/**
 * @var array $materias
 * @var array $grados
 * @var array $materiasxgrado
 * @var \CodeIgniter\Pager\Pager $pager
 * @var \CodeIgniter\View\View $this
 */
$this->extend('main_template');
?>
<?php $this->section('content')?>
<div class="text-right">
    <a href="<?= site_url(['materiaxgrado','addMateriaXGrado'])?>" class="btn btn-primary mb-3 mr-3">Asignar Materia</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre Materia</th>
                <th scope="col">Grado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materiasxgrado as $materiaxgrado):?>
                <tr>
                    <td><?= esc($materiaxgrado['mxg_id']);?></td>
                    <td><?= esc($materiaxgrado['mxg_id_mat']);?></td>
                    <td><?= esc($materiaxgrado['mxg_id_grd']);?></td>
                    
                    <td class="text-right">
                        <a href="<?= site_url(['materia','editMateria',$materiaxgrado['mxg_id']])?>" class="btn btn-primary mb-3 mr-3">Editar</a>
                        <a href="<?= site_url(['materia','deleteMateria',$materiaxgrado['mxg_id']])?>" class="btn btn-warning mb-3 mr-3">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
    <div>
        <?= $pager->Links();?>
    </div>
<?php $this->endSection(); ?>