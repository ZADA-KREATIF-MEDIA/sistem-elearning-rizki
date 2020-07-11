<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */

$this->title = "KELAS ". $model->nama_kelas ." ". $model->jenjang;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$connection = Yii::$app->getDb();
$id_kelas=$model->id_kelas;
?>
<div class="kelas-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_kelas',
            'nama_kelas',
            'jenjang',
            
        ],
    ]) ?>
 <?php


$command = $connection->createCommand("SELECT * FROM SISWA WHERE id_kelas=$id_kelas");

$result = $command->queryAll();
?>
<table class="table table-responsive">
    <thead class="bg-blue-gradient">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NIS</th>
            <th scope="col">NAMA</th>
            <th scope="col">ALAMAT</th>
            <th scope="col">JENIS KELAMIN</th>
            <th scope="col">TANGGAL LAHIR</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($result as $data) {

        ?>
            <tr>
                <td scope="row"><?= $no; ?></td>
                    <td><?= $data['nis']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td><?= $data['jenis_kelamin']; ?></td>
                    <td><?= $data['tgl_lahir']; ?></td>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>

</div>
