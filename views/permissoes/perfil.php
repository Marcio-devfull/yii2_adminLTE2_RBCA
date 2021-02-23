<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

?>
<h1>Listando Perfis</h1>

<?= Yii::$app->user->can('permissoes/cadastrar-perfil') ?
    Html::a('Cadastrar Perfil', ['/permissoes/cadastrar-perfil'], ['class' => 'btn btn-primary'] ) : '' ?>


<table class="table table-striped table-hover">
    <thead>
       <tr>
           <th>Perfil</th>
           <th>Atribuir Permissão</th>
       </tr>
    </thead>
    <tbody>
    <?php foreach($perfis as $perfil) :?>
        <tr>
            <td><?php echo $perfil->name?></td>
            <td><?= Html::a('Adicionar Regra', ['/permissoes/regras/', 'perfil' => $perfil->name], ['class' => 'btn btn-warning'] ) ?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
