<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadModel extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            ['file', 'file', 'extensions' => 'pdf, jpg, gif, png, doc, docx, xls, xlsx, ppt, pptx, csv, txt, odt, cdr, ai, psd', 'maxSize' => 5120000, 'tooBig' => 'Limit is 5MB per file'],
        ];
    }
}
?>