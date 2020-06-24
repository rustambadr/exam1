<?php
  use yii\widgets\ActiveForm;
  $this->title = 'Загрузка файлов';
?>
<div class="upload-block">
  <div class="container">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
      <?= $form->field($model, 'files[]')->fileInput(['multiple' => true])->label(false) ?>
      <button>Загрузить</button>
    <?php ActiveForm::end() ?>
  </div>
</div>
