<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MataPelajaran */

$this->title = 'Create Mata Pelajaran';
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-pelajaran-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
