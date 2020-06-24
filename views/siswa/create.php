<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\siswa */

$this->title = 'Create Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Siswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
