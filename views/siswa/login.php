<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>E</b>-LEARNING</a>
    </div>
    
    <!-- /.login-logo -->
    <div class="login-box-body">
    
        <?= Html::a('<i class="fa fa-key"></i>ADMIN', ['/site/login'], ['class'=>'btn btn-app bg-navy']) ?>
        <?= Html::a('<i class="fa fa-users"></i>SISWA', ['/siswa/login'], ['class'=>'btn btn-app bg-green']) ?>
        <?= Html::a('<i class="fa fa-suitcase"></i>GURU', ['/guru/login'], ['class'=>'btn btn-app bg-navy']) ?>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
           
            <!-- /.col -->
            <div class="col-xs-12">
                <?= Html::submitButton('LOGIN SISWA', ['class' => 'btn bg-green btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>


       
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
