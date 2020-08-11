<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
 
   <?= $form->field($model, 'nis')->textInput() ?>
 
   <?= $form->field($model, 'id_tugas')->textInput() ?>
 
   <?= $form->field($model, 'tanggal_upload')->textInput(['maxlength' => true]) ?>
 
   <?= $form->field($model, 'isi')->textInput(['maxlength' => true]) ?>
 
   <?= $form->field($model, 'status')->textInput() ?>
 
   <?= $form->field($model, 'gambar')->fileInput() ?>
 
   <div class="form-group">
       <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
   </div>
 
   <?php ActiveForm::end(); ?>