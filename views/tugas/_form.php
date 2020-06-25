<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tugas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_mapel')->textInput() ?>

    <?= $form->field($model, 'nama_tugas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
