<?php

/* @var $this yii\web\View */
use  yii\web\Session;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'DATA KELAS SISWA';
$connection = Yii::$app->getDb();
?>
<div class="site-index">

<div class="row">

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
            $no = 1;
            foreach ($result as $data) {

            ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nis']; ?></td>
                 
                    <td>
                                  
                   </td>
                </tr>
            <?php
                $no++;
            }
            ?>
       
