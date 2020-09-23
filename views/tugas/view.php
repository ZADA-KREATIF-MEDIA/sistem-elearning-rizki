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
        'title' => 'UPLOAD TUGAS SISWA', 'class' => 'showModalButton btn btn-success btn-block',
    ]
);
?>
</br>
<?php

/*MENAMPILKAN MATA PELAJARAN YANG ADA PADA KELAS TERTENTU*/
/*SELECT * FROM mata_pelajaran JOIN kelas ON mata_pelajaran.id_kelas=kelas.id_kelas WHERE mata_pelajaran.id_kelas=8*/

/*MENAMPILKAN TUGAS YANG BERADA PADA MATA KULIAH TERTENTU*/
/*SELECT kelas.nama_kelas,kelas.jenjang, mata_pelajaran.nama_mapel,tugas.nama_tugas FROM mata_pelajaran JOIN kelas ON mata_pelajaran.id_kelas=kelas.id_kelas JOIN tugas ON mata_pelajaran.id_mapel=tugas.id_mapel WHERE mata_pelajaran.id_kelas=8;*/


/*MENAMPILKAN SISWA YANG BERADA PADA TUGAS TERTENTU*/
/*SELECT kelas.nama_kelas,kelas.jenjang, mata_pelajaran.nama_mapel,tugas.nama_tugas,siswa.nama FROM mata_pelajaran JOIN kelas ON mata_pelajaran.id_kelas=kelas.id_kelas JOIN tugas ON mata_pelajaran.id_mapel=tugas.id_mapel JOIN siswa ON kelas.id_kelas=siswa.id_kelas WHERE mata_pelajaran.id_kelas=8 AND tugas.id_tugas=76;*/

/*QUERY BACKUP */
/*SELECT siswa.nis,kelas.nama_kelas,kelas.jenjang, mata_pelajaran.nama_mapel,tugas.nama_tugas,siswa.nama,tugas_detail.tanggal_upload, tugas_detail.nama_file, tugas_detail.nilai FROM mata_pelajaran JOIN kelas ON mata_pelajaran.id_kelas=kelas.id_kelas JOIN tugas ON mata_pelajaran.id_mapel=tugas.id_mapel JOIN siswa ON kelas.id_kelas=siswa.id_kelas JOIN tugas_detail ON tugas.id_tugas=tugas_detail.id_tugas WHERE mata_pelajaran.id_kelas=".$model->mapel->id_kelas." AND tugas.id_tugas=".$model->id_tugas." AND tugas_detail.status=1*/

$command = $connection->createCommand("SELECT td.id,s.nis,s.nama, td.tanggal_upload,td.nilai, t.nama_tugas,td.nama_file FROM tugas_detail td JOIN tugas t ON td.id_tugas=t.id_tugas JOIN siswa s ON td.nis=s.nis WHERE td.id_tugas=".$model->id_tugas."");

$result = $command->queryAll();
?>

<table class="table table-responsive">
    <thead class="bg-blue-gradient">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA SISWA</th>
            <th scope="col">NIS</th>
            <th scope="col">TANGGAL UPLOAD</th>
            <th scope="col">NAMA FILE</th>
            <th scope="col">NILAI</th>
            
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
                    <td><?= $data['tanggal_upload']; ?></td>
                    <td><?= $data['nama_file']; ?></td>
                    <td>
                    <?php
                        $session = Yii::$app->session;
                        foreach ($_SESSION as $session_name => $session_value)
                        {
                        $nama_sesi=$session_name;
                        }
                        
                        if($data['nilai']==0 && $nama_sesi=="guru")
                        {
                            //$id = $data['id'];
                            echo Html::button(
                                'BERI NILAI',
                                [
                                    'value' => Url::to(['tugas-detail/update', 'id' => $data['id']]),
                                    'title' => 'UPLOAD TUGAS SISWA', 'class' => 'showModalButton btn bg-maroon btn-sm',
                                ]
                            );
                        }
                        else
                        {
                            echo $data['nilai'];
                        }
                    ?>                  
                   </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
</table>
</div>
