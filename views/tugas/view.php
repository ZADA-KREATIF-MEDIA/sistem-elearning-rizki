<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tugas */

$this->title = $model->nama_tugas;
$this->params['breadcrumbs'][] = ['label' => 'Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tugas-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tugas',
            'id_mapel',
            'nama_tugas',
            'tanggal_upload',
            'nama_file',
        ],
    ]) ?>

</div>
