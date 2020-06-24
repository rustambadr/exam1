<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class FilesForm extends Model
{
    public $files = false;

    public function rules()
    {
        return [
            [['files'], 'file', 'skipOnEmpty' => false, 'maxFiles' => 5],
        ];
    }

    public function saveModel() {
      if( !$this->validate() ) return false;
      foreach ($this->files as $file) {
        $name = md5(md5(time()).$file->baseName) . '.' . $file->extension;
        $file->saveAs('temp/' . $name);

        $fileModel = new Files;
        $fileModel->name = $name;
        $fileModel->datecreate = date('Y-m-d H:i:s');
        $fileModel->save();
      }

      return true;
    }
}
