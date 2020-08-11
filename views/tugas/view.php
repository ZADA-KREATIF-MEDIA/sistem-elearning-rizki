<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\tugas */

$this->title = $model->nama_tugas;
$this->params['breadcrumbs'][] = ['label' => 'Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$connection = Yii::$app->getDb();
?>
<div class="tugas-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'label'=>'NAMA PATA PELAJARAN',
                'attribute'=>'id_mapel',
                'value'=>function($model)
                {
                 return $model->mapel->nama_mapel ;
                }
            ],
            [
                'label'=>'KELAS',
                'attribute'=>'id_kelas',
                'value'=>function($model)
                {
                 return $model->mapel->id_kelas;
                }
            ],
            'nama_tugas',
            'tanggal_upload',
            'nama_file',
        ],
    ]) ?>

<?=Html::button(
    'UPLOAD TUGAS SISWA',
    [
        'value' => Url::to(['tugas-detail/create']),
        'title' => 'UPLOAD TUGAS SISWA', 'class' => 'showModalButton btn btn-danger btn-block',
    ]
);
?>
</br>
<?php


$command = $connection->createCommand("SELECT * FROM siswa ");

$result = $command->queryAll();
?>
<div class="alert alert-success" role="alert">
 Data Siswa yang telah mengumpulkan tugas akan di tampilkan pada tabel di bawah 
</div>
<table class="table table-responsive">
    <thead class="bg-blue-gradient">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA SISWA</th>
            <th scope="col">NIS</th>
            <th scope="col">TANGGAL UPLOAD</th>
            <th scope="col">NAMA FILE</th>
            <th scope="col">NILAI</th>
            <th scope="col">AKSI</th>
        </tr>
        </thead>
        <tbody>
        <tbody>
            <?php
            $no = 1;
            foreach ($result as $data) {

            ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nis']; ?></td>
                
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
</table>
</div>
