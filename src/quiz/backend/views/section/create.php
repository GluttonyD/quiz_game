<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\SectionForm $model
 */

use yii\widgets\ActiveForm;

$this->title='Добавление блока';
?>
<div class="row">
    <div class="col-md-4">
        <?php $form=ActiveForm::begin() ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Данные блока</h3>
            </div>
            <div class="box-body">
                <?= $form->field($model,'name')->textInput()->label('Название') ?>
                <?= $form->field($model,'background')->fileInput()->label('Оформление') ?>
            </div>
            <div class="box-footer">
                <button class="btn btn-success btn-flat">Добавить</button>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

