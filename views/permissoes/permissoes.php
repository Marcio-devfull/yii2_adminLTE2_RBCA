<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

?>
<h1>Listando Permissões</h1>



<?= Yii::$app->user->can('permissoes/cadastrar-perfil') ? 
    (Html::a('Cadastrar Permissão', ['/permissoes/cadastrar-permissao'], ['class' => 'btn btn-primary'])) : '';
?>


<table class="table table-striped table-hover">
    <thead>
       <tr>
           <th>Permissão</th>
       </tr>
    </thead>
    <tbody>
    <?php foreach($permissoes as $permissao) :?>
        <tr>
            <td><?php echo $permissao->name?></td>
            <td></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
