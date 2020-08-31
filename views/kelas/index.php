<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-index">
<?php
$session = Yii::$app->session;

foreach ($_SESSION as $session_name => $session_value)
{
$nama_sesi=$session_name;
}
if($nama_sesi=="guru" || $nama_sesi=="user") {?>
<p>
        <?= Html::button(
            'TAMBAH',
            [
                'value' => Url::to(['create']),
                'title' => 'TAMBAH DATA', 'class' => 'showModalButton btn btn-primary'
            ]
        ); ?>

    </p>
<?php } else {
     echo "";   
}?>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_kelas',
            'nama_kelas',
            'jenjang',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'AKSI',
                'template' => '{update}&nbsp;{delete}&nbsp;{view}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        $id = $model->id_kelas;
                        $session = Yii::$app->session;
                        foreach ($_SESSION as $session_name => $session_value)
                        {
                        $nama_sesi=$session_name;
                        }
                        if($nama_sesi=="guru" || $nama_sesi=="user") {
                        return Html::button(
                            'Update',
                            [
                                'value' => Url::to(['update', 'id' => $id]),
                                'title' => 'UPDATE DATA', 'class' => 'showModalButton btn btn-success btn-sm'
                            ]
                        );
                    }
                    },
                    'delete' => function ($url, $model) {
                        $session = Yii::$app->session;
                        foreach ($_SESSION as $session_name => $session_value)
                        {
                        $nama_sesi=$session_name;
                        }
                        if($nama_sesi=="guru" || $nama_sesi=="user") {
                        return Html::a('Delete', ['delete', 'id' => $model->id_kelas], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Apakah anda akan menghapus data ini ?',
                                'method' => 'post',
                            ],
                        ]);
                        }
                    },
                    'view' => function ($url, $model) {
                        return Html::a('View', ['view', 'id' => $model->id_kelas], [
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
