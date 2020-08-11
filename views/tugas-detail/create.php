<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TugasDetail */

$this->title = 'Create Tugas Detail';
$this->params['breadcrumbs'][] = ['label' => 'Tugas Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tugas-detail-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
