<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MATA PELAJARAN & KELAS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-pelajaran-index">
<?php
$session = Yii::$app->session;

foreach ($_SESSION as $session_name => $session_value)
{
$nama_sesi=$session_name;
}
if($nama_sesi=="user") {?>


    <p>
        <?=Html::button(
    'TAMBAH',
    [
        'value' => Url::to(['create']),
        'title' => 'TAMBAH DATA', 'class' => 'showModalButton btn btn-primary',
    ]
);?>

    </p>
    <?php } else {
     echo "";   
}?>
    <?php Pjax::begin();?>
    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{items}{pager}{summary}',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'nama_mapel',
        [
            'label'=>'KELAS',
            'attribute'=>'id_kelas',
            'value'=>function($model)
            {
             return $model->kelas->nama_kelas."-".$model->kelas->jenjang ;
            } 
        ],
        [
            'label'=>'GURU PENGAMPU',
            'attribute'=>'id_guru',
            'value'=>function($model)
            {
             return $model->guru->nip."-".$model->guru->nama ;
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'AKSI',
            'template' => '{update}&nbsp;{delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    $id = $model->id_mapel;
                    $session = Yii::$app->session;
                    foreach ($_SESSION as $session_name => $session_value)
                    {
                    $nama_sesi=$session_name;
                    }
                    if($nama_sesi=="user") {
                    return Html::button(
                        'Update',
                        [
                            'value' => Url::to(['update', 'id' => $id]),
                            'title' => 'UPDATE DATA', 'class' => 'showModalButton btn btn-success',
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
                    if($nama_sesi=="user") {
                    return Html::a('Delete', ['delete', 'id' => $model->id_mapel], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Apakah anda akan menghapus data ini ?',
                            'method' => 'post',
                        ],
                    ]);
                    }
                },
                
            ],
        ],
    ],

]);?>

    <?php Pjax::end();?>

</div>
