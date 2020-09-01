<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'KELAS DAN TUGAS';
$this->params['breadcrumbs'][] = $this->title;
$connection = Yii::$app->getDb();
?>
<div class="tugas-index">
<?php


$session = Yii::$app->session;
$nis=$_SESSION['siswa'];
foreach ($_SESSION as $session_name => $session_value)
{
$nama_sesi=$session_name;

}

$command = $connection->createCommand("SELECT * FROM SISWA JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE siswa.nis=".$nis."");

$result = $command->queryAll();
?>


            <?php
           
            foreach ($result as $data) {

            ?>
             
                  
                   <h4>NIS : <?= $data['nis']; ?>, NAMA SISWA : <?= $data['nama']; ?>, KELAS : <?= $data['nama_kelas']; ?>
                   - <?= $data['jenjang']; ?>
                   </h4>
                  
                
            <?php
               
            }
            ?>
       
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



    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}{summary}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'MAPEL',
                'attribute'=>'id_mapel',
                'value'=>function($model)
                {
                 return $model->mapel->nama_mapel;
                } 
            ],
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
                        return  Html::a('DOWNLOA', ["localhost:8080".$model->nama_file.""]);
                    },
                    'update' => function ($url, $model) {
                        $id = $model->id_tugas;
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
                        return Html::a('Delete', ['delete', 'id' => $model->id_tugas], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Apakah anda akan menghapus data ini ?',
                                'method' => 'post',
                            ],
                        ]);
                        }
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
