<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Guru */

$this->title = $model->nip;
$this->params['breadcrumbs'][] = ['label' => 'Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$connection = Yii::$app->getDb();
$id_guru=$model->nip;
?>
<div class="guru-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nip',
            'nama',
            'alamat:ntext',
            'no_tlp',
            'username',
            'password',
            'level',
        ],
    ]) ?>
 <?php


$command = $connection->createCommand("SELECT * FROM mata_pelajaran JOIN kelas ON mata_pelajaran.id_kelas=kelas.id_kelas WHERE id_guru=$id_guru");

$result = $command->queryAll();
?>
<h4>MATA PELAJARAN YANG DI AMPU</h4>

<table class="table table-responsive">
    <thead class="bg-blue-gradient">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">KODE MAPEL</th>
            <th scope="col">NAMA MAPEL</th>
            <th scope="col">KELAS</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($result as $data) {

        ?>
            <tr>
                <td scope="row"><?= $no; ?></td>
                    
                    <td><?= $data['id_mapel']; ?></td>
                    <td><?= $data['nama_mapel']; ?></td>
                    <td><?= $data['nama_kelas']; ?>-<?= $data['jenjang']; ?></td>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>

</div>

