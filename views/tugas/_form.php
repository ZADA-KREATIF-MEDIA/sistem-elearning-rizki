<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*import array helper karena data yang di perlukan berbentuk array*/
use yii\helpers\ArrayHelper;
use app\models\MataPelajaran;

/* @var $this yii\web\View */
/* @var $model app\models\tugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tugas-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <!--pembuatan dropdown list mapel-->
    <?= $form->field($model, 'id_mapel')->dropDownList(
    	ArrayHelper::map(MataPelajaran::find()->all(),'id_mapel','nama_mapel'),
    	['prompt'=>'--Silahkan Pilih Mata Pelajaran --']
    ) ?>

    <?= $form->field($model, 'nama_tugas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_upload')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'nama_file')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
