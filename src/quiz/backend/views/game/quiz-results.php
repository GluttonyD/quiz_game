<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\ResultsForm $model
 */

$this->title = 'Подсчет результатов'
?>
<form method="post" action="/game/get-results">
    <input type="hidden" value="1" name="ResultsForm[quiz_id]">
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <?php foreach ($model->users as $user) { ?>
        <div class="user-results">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?= $user->username ?></h3>
                        </div>
                        <div class="box-body">
                            <?php foreach ($user->questions as $question) { ?>
                                <dl>
                                    <dt style="font-size: small"><?= $question->info->text ?></dt>
                                    <?php if ($question->info->type == 1) { ?>
                                        <?php foreach ($question->answers as $answer) { ?>
                                            <dd><?= $answer->answer->text ?>  <?= ($answer->is_right) ? '+' : '-' ?></dd>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($question->info->type == 2 ){ ?>
                                        <?php foreach ($question->answers as $answer) { ?>
                                            <dd>Ответ: <?= $answer->text ?></dd>
                                        <?php } ?>
                                    <?php } ?>
                                </dl>
                            <?php } ?>
                            <p><input type="text" class="form-control"
                                      name="ResultsForm[results][<?= $user->id ?>]"
                                      placeholder="Введите результат"></p>
                        </div>
                        <div class="box-footer">
                            <button id="next-user" class="btn btn-warning btn-flat">Следующая команда</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</form>
