<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tugas-index">

  

    <p>
        <?=Html::button(
    'TAMBAH',
    [
        'value' => Url::to(['create']),
        'title' => 'TAMBAH DATA', 'class' => 'showModalButton btn btn-primary',
    ]
);?>

    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
      
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tugas',
            'id_mapel',
            'nama_tugas',
            'tanggal_upload',
            'nama_file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
