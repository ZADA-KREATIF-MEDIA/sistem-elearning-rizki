<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TugasDetail */

$this->title = 'Update Tugas Detail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tugas Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tugas-detail-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
