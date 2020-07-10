<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MataPelajaran */

$this->title = 'Update Mata Pelajaran: ' . $model->id_mapel;
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_mapel, 'url' => ['view', 'id' => $model->id_mapel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mata-pelajaran-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
