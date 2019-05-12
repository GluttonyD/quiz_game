<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 07.05.2019
 * Time: 16:10
 */

namespace backend\controllers;

use common\models\Section;
use Yii;
use yii\web\Controller;
use app\models\SectionForm;
use yii\web\UploadedFile;

class SectionController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return false;
        }
        return true;
    }

    public function actionIndex(){
        $sections=Section::find()->all();
        return $this->render('index',[
            'sections'=>$sections
        ]);
    }

    public function actionCreate(){
        $model=new SectionForm();
        if($model->load(Yii::$app->request->post())){
            $model->background=UploadedFile::getInstance($model,'background');
            if($model->create()){
                return $this->redirect('index');
            }
        }
        return $this->render('create',[
           'model'=>$model
        ]);
    }
}