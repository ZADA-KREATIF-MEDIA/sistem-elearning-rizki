<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* kerena kita membutuhkan data kelas dan guru maka kita harus memanggil data kelas dan guru 
yang di wakilkan oleh model*/
use app\models\Kelas;
/* @var $this yii\web\View */
/* @var $model app\models\siswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nis')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'L' => 'laki-laki','P' => 'Perempuan', ], ['prompt' => '-- Pilih Jenis Kelamin--']) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'level')->dropDownList([ '1' => 'Siswa' ], ['prompt' => '-- Pilih Level--']) ?>

     <?= $form->field($model, 'id_kelas')->dropDownList(
    	ArrayHelper::map(Kelas::find()->all(),'id_kelas','nama_kelas','jenjang'),
    	['prompt'=>'--Silahkan Pilih Kelas --']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
