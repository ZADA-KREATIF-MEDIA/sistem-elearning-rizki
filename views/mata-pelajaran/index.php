<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Pelajarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-pelajaran-index">



    <p>
        <?=Html::button(
    'TAMBAH',
    [
        'value' => Url::to(['create']),
        'title' => 'TAMBAH DATA', 'class' => 'showModalButton btn btn-primary',
    ]
);?>

    </p>

    <?php Pjax::begin();?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{items}{pager}{summary}',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id_mapel',
        [

            'attribute' => 'id_kelas',
            'value' => 'id_kelas',
        ],
        'nama_mapel',
        [
            'header' => 'NAMA GURU',
            'value' => 'id_guru.nip.nama_guru',
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'AKSI',
            'template' => '{update}&nbsp;{delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    $id = $model->id_mapel;
                    return Html::button(
                        'Update',
                        [
                            'value' => Url::to(['update', 'id' => $id]),
                            'title' => 'UPDATE DATA', 'class' => 'showModalButton btn btn-success',
                        ]
                    );
                },
                'delete' => function ($url, $model) {
                    return Html::a('Delete', ['delete', 'id' => $model->id_mapel], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Apakah anda akan menghapus data ini ?',
                            'method' => 'post',
                        ],
                    ]);
                },
            ],
        ],
    ],

]);?>

    <?php Pjax::end();?>

</div>
