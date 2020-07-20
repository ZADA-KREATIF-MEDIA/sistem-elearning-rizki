<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

 

<p>
        <?= Html::button(
            'TAMBAH',
            [
                'value' => Url::to(['create']),
                'title' => 'TAMBAH DATA', 'class' => 'showModalButton btn btn-primary'
            ]
        ); ?>

    </p>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_admin',
            'nama',
            'username',
            'password',
            'level',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'AKSI',
                'template' => '{update}&nbsp;{delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        $id = $model->id_admin;
                        return Html::button(
                            'Update',
                            [
                                'value' => Url::to(['update', 'id' => $id]),
                                'title' => 'UPDATE DATA', 'class' => 'showModalButton btn btn-success'
                            ]
                        );
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('Delete', ['delete', 'id' => $model->id_admin], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Apakah anda akan menghapus data ini ?',
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
