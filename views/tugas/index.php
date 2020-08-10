<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DATA TUGAS';
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
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama_tugas',
            'tanggal_upload',
            'nama_file',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'AKSI',
                'template' => '{download}&nbsp;{update}&nbsp;{delete}&nbsp;{view}',
                'buttons' => [
                    'download' => function ($url, $model) 
                    {
                        $id = $model->id_tugas;
                        return Html::button(
                            'DOWNLOAD',
                            [
                                'value' => Url::to(['unduh', 'id' => $id]),
                                'title' => 'DOWNLOAD FILE', 'class' => 'showModalButton btn btn-info btn-sm'
                            ]
                        );
                    },
                    'update' => function ($url, $model) {
                        $id = $model->id_tugas;
                        return Html::button(
                            'Update',
                            [
                                'value' => Url::to(['update', 'id' => $id]),
                                'title' => 'UPDATE DATA', 'class' => 'showModalButton btn btn-success btn-sm'
                            ]
                        );
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('Delete', ['delete', 'id' => $model->id_tugas], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Apakah anda akan menghapus data ini ?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'view' => function ($url, $model) {
                        return Html::a('View', ['view', 'id' => $model->id_tugas], [
                            'class' => 'btn btn-warning btn-sm',
                            'data' => [
                                
                                'method' => 'post',
                            ],
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
