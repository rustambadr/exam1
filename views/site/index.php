<?php
  use yii\grid\GridView;
  $this->title = 'Список файлов';
?>
<div class="file-list">
  <div class="container">
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
    ]); ?>
  </div>
</div>
