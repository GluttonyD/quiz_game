<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\QuestionForm $model
 */

$this->title = 'Добавление вопроса';

?>

<form method="post" action="/question/create" enctype="multipart/form-data">
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Информация о вопросе</h3>
                </div>
                <div class="box-body">
                    <label for="question-text">Текст вопроса</label>
                    <input id="question-text" class="form-control" type="text" name="QuestionForm[text]">
                    <div class="form-group">
                        <label for="question-type">Тип вопроса</label>
                        <select id="question-type" class="form-control select2 select2-hidden-accessible"
                                style="width: 100%;" tabindex="-1" aria-hidden="true"
                                name="QuestionForm[type]">
                            <option selected="selected" disabled>Выберите тип</option>
                            <option value="1">С выбором ответа</option>
                            <option value="2">С вводом ответа</option>
                        </select>
                    </div>
                    <label for="question-file">Дополнительный файл</label>
                    <input id="question-file" type="file" name="QuestionForm[addition_file]">
                </div>
                <div class="box-footer">
                    <button class="btn btn-warning btn-flat">Добавить вопрос</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="question-answer" class="box box-warning">
                <div class="box-header" id="answer-header">
                    <h3 class="box-title">Ответ на вопрос</h3>
                </div>
                <div class="box-body" id="answer-body">

                </div>
            </div>
        </div>
    </div>
</form>
