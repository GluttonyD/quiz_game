<?php
/**
 * @var \yii\web\View $this
 * @var \common\models\Quiz $quiz
 */

$this->title = 'Игра!';
$i = 0;
?>
<form id="game-form" method="post">
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <div class="row">
        <?php foreach ($quiz->sections as $section) { ?>
            <?php foreach ($section->questions as $question) { ?>
                <div id="question-<?= $i ?>" class="col-md-offset-2 col-md-8 game-question"
                     style="display:<?= ($i == 0) ? 'block' : 'none' ?>"
                     data-section="<?= $section->name ?>" <?= ($question->addition_file) ? 'data-images="1"' : 'data-images="0"' ?>
                     data-background="/<?= $section->background ?>">
                    <div class="box box-warning" style="border-top-color: #0b3e6f">
                        <div class="box-header" style="background-color: #0b3e6f; color:#ffffff;">
                            <h1 class="box-title quiz-section-name"
                                style="font-size: xx-large"><?= $section->name ?></h1>
                        </div>
                        <div class="box-body game-questions"
                             style="background-image: url(/<?= $section->background ?>); background-repeat: round">
                            <div class="question-box">
                                <?= $question->text ?>
                            </div>
                        </div>
                        <input type="hidden" name="QuizForm[answers][<?= $i ?>][question_id]"
                               value="<?= $question->id ?>">
                        <div class="box-footer" style="background-color: #0b3e6f; border-top-color: #0b3e6f">
                            <?php if ($question->addition_file && ($question->file_ext == 'jpg' || $question->file_ext == 'png')) { ?>
                                <button id="<?= $question->id ?>" class="btn btn-primary btn-flat btn-add-files"
                                        style="display: block">Показать картинку
                                </button>
                            <?php } ?>
                            <?php if ($question->type == 1) { ?>
                                <?php foreach ($question->answers as $answer) { ?>
                                    <p>
                                        <span style="color: #ffffff;">
                                        <?= $answer->text ?>
                                            <select id="question-type"
                                                    class="form-control select2 select2-hidden-accessible"
                                                    style="width: 50%;" tabindex="-1" aria-hidden="true"
                                                    name="QuizForm[answers][<?= $i ?>][items][<?= $answer->id ?>][is_right]">
                                            <option value="0">Нет</option>
                                            <option value="1">Да</option>
                                        </select>
                                            </span>
                                    </p>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($question->type == 2) { ?>
                                <input type="text" class="form-control"
                                       name="QuizForm[answers][<?= $i ?>][items][<?= $question->answers[0]->id ?>][answer]"
                                       placeholder="Введите ответ">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php $i++;
            } ?>
        <?php } ?>
    </div>
    <button type="submit" id="send-answers" style="display: none"></button>
</form>

<div class="modal modal-warning fade" id="results-modal" style="display: none; background: rgb(0, 0, 0);">
    <div class="modal-dialog" style="width: 90%;margin-top: 10%">
        <div class="modal-content" style="">
            <div class="modal-body modal-picture"
                 style="height: 750px; background-image: url(/files/backgrounds/1.png); background-repeat: round">
                <div class="modal-text">
                    <p class="modal-section-name">Тур "<?= $quiz->sections[0]->name ?>"</p>
                    <p class="question-number">Вопрос №1</p>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-warning fade" id="final-modal" style="display: none; background: rgb(0, 0, 0);">
    <div class="modal-dialog" style="width: 90%;margin-top: 10%">
        <div class="modal-content" style="">
            <div class="modal-body game-results"
                 style="height: 750px; background-color: #0b3e6f !important; color: #ffffff; !important;">
                <div class="modal-text-result result-text">
                    <h3>Результаты</h3>
                    <div class="team-results"></div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="rules-modal" style="display: none; background: rgb(0, 0, 0);">
    <div class="modal-dialog" style="width: 90%; margin-top: 10%">
        <div class="modal-content" style="">
            <div class="modal-body modal-picture"
                 style="height: 750px; background-image: url(/files/backgrounds/1.png); background-repeat: round">
                <div class="modal-text-rules section-rules" style="margin-top: 18% !important;">
                    <p>Правила тура "<?= $quiz->sections[0]->name ?>"</p>
                    <p><?= $quiz->sections[0]->rules ?></p>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="files-modal" style="display: none; background: rgb(0, 0, 0);">
    <div class="modal-dialog" style="width: 90%;margin-top: 10%">
        <div class="modal-content" style="">
            <div class="modal-body modal-picture modal-question-file"
                 style="height: 750px; background-image: url(/files/backgrounds/1.png); background-repeat: round; background-size: 100%">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-warning fade" id="start-modal" style="display: none; background: rgb(0, 0, 0);">
    <div class="modal-dialog" style="width: 90%;margin-top: 10%">
        <div class="modal-content" style="">
            <div class="modal-body modal-picture modal-question-file"
                 style="height: 750px; background-image: url(/files/start.jpg); background-repeat: round">
                <div class="modal-text section-rules" style="margin-top: 15% !important;">
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>