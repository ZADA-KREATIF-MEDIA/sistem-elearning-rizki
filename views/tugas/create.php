<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tugas */

$this->title = 'Create Tugas';
$this->params['breadcrumbs'][] = ['label' => 'Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tugas-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
