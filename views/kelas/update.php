<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */

$this->title = 'Update Kelas: ' . $model->id_kelas;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kelas, 'url' => ['view', 'id' => $model->id_kelas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kelas-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
