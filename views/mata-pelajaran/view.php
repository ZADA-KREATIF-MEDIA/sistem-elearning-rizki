<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MataPelajaran */

$this->title = $model->id_mapel;
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mata-pelajaran-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_mapel',
            'id_kelas',
            'nama_mapel',
            'id_guru',
        ],
    ]) ?>

</div>
