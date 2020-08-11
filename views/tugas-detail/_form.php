<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Siswa;
use app\models\Tugas;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\TugasDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tugas-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nis')->dropDownList(
    	ArrayHelper::map(Siswa::find()->all(),'nis','nama'),
    	['prompt'=>'--Silahkan Pilih Nama Siswa --']
    ) ?>
   

      <?= $form->field($model, 'id_tugas')->dropDownList(
    	ArrayHelper::map(Tugas::find()->all(),'id_tugas','nama_tugas'),
    	['prompt'=>'--Silahkan Pilih Nama Tugas --']
    ) ?>
    <?= $form->field($model, 'tanggal_upload')->textInput(['type'=>'DATE']) ?>

    <?= $form->field($model, 'nama_file')->fileInput() ?>

    <?= $form->field($model, 'nilai')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('UPLOAD', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
