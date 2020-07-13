<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tugas */

$this->title = 'Update Tugas: ' . $model->id_tugas;
$this->params['breadcrumbs'][] = ['label' => 'Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tugas, 'url' => ['view', 'id' => $model->id_tugas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tugas-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
