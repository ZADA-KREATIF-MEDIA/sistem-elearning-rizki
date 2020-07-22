<?php

/* @var $this yii\web\View */

$this->title = 'E-LEARNING';
$connection = Yii::$app->getDb();
?>
<div class="site-index">

<div class="row">
<?php


$command = $connection->createCommand("SELECT * FROM kelas");
$command2 = $connection->createCommand("SELECT * FROM tugas");
$command3 = $connection->createCommand("SELECT * FROM mata_pelajaran");
$command4 = $connection->createCommand("SELECT * FROM siswa");
$jumlah_kelas = $command->queryAll();
$jumlah_tugas = $command2->queryAll();
$jumlah_mapel = $command3->queryAll();
$jumlah_siswa = $command4->queryAll();

?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-building"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">JUMLAH KELAS</span>
              <span class="info-box-number"><h3><?= count($jumlah_kelas) ?></h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">JUMLAH TUGAS</span>
                <span class="info-box-number"><h3><?= count($jumlah_tugas) ?></h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">MATA PELAJARAN</span>
              <span class="info-box-number"><h3><?= count($jumlah_mapel) ?></h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">JUMLAH SISWA</span>
              <span class="info-box-number"><h3><?= count($jumlah_siswa) ?></h3></span>
            </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <?php
         $user_id=Yii::$app->user->identity;
         
         var_dump($user_id);
         ?>
      </div>
      <!-- /.row -->
      
      
</div>
