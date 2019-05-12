<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 07.05.2019
 * Time: 16:15
 */

namespace app\models;

use yii\web\UploadedFile;
use Yii;
use common\models\Section;

class SectionForm extends \yii\base\Model
{
    public $name;
    /**
     * @var UploadedFile
     */
    public $background;

    public function rules()
    {
        return [
            [['name','background'],'required'],
            ['name','string'],
            ['background','file']
        ];
    }

    public function create(){
        if($this->validate()){
            $this->background->saveAs('files/backgrounds/'.$this->background->baseName.'.'.$this->background->extension);
            $section=new Section();
            $section->name=$this->name;
            $section->background='files/backgrounds/'.$this->background->baseName.'.'.$this->background->extension;
            $section->save();
            return true;
        }
        return false;
    }
}