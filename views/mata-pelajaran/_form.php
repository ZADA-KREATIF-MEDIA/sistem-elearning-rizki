<?php

/*import array helper karena data yang di perlukan berbentuk array*/
use yii\helpers\ArrayHelper;

/* kerena kita membutuhkan data kelas dan guru maka kita harus memanggil data kelas dan guru 
yang di wakilkan oleh model*/
use app\models\Kelas;
use app\models\Guru;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MataPelajaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mata-pelajaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--pembuatan dropdown list kelas-->
    <?= $form->field($model, 'id_kelas')->dropDownList(
    	ArrayHelper::map(Kelas::find()->all(),'id_kelas','nama_kelas','jenjang'),
    	['prompt'=>'--Silahkan Pilih Kelas --']
    ) ?>

    <?= $form->field($model, 'nama_mapel')->textInput(['maxlength' => true]) ?>

    <!--pembuatan dropdown list guru-->
    <?= $form->field($model, 'id_guru')->dropDownList(
    	ArrayHelper::map(Guru::find()->all(),'nip','nama'),
    	['prompt'=>'--Silahkan Pilih Guru --']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
