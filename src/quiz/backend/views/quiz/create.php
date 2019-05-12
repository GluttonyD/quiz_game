<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\QuizForm
 */
$this->title='Создание игры';
?>
<form method="post" action="/quiz/create">
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Информация об игре</h3>
                </div>
                <div class="box-body">
                    <label for="quiz-name">Название игры</label>
                    <input id="quiz-name" type="text" class="form-control" name="QuizForm[name]">
                </div>
                <div class="box-footer">
                    <button class="btn btn-warning btn-flat">Создать игру</button>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Вопросы игры</h3>
                    <button class="btn btn-danger btn-flat" id="remove-section">Убрать блок</button>
                    <button class="btn btn-success btn-flat" id="add-section">Добавить блок</button>
                </div>
                <div class="box-body section-list"></div>
            </div>
        </div>
    </div>
    <div class="quiz-question-list">

    </div>
</form>
