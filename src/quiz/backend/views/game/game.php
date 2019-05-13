<?php
/**
 * @var \common\models\Quiz $quiz
 * @var \yii\web\View $this
 */

$this->title = 'Игра';
$i = 0;
$j = 0;
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-warning" style=" border-top-color:#0b3e6f">
            <div class="box-header" style="background-color: #0b3e6f; color: #ffffff; border-top-color:#0b3e6f">
                <h3 class="box-title"><?= $quiz->name ?></h3>
            </div>
            <div data-count="<?= $count ?>" data-first_section="<?= $quiz->sections[0]->id ?>" class="box-body"
                 id="game-questions"
                 style="background-image: url(/<?= $quiz->sections[0]->background ?>); background-repeat: round">
                <?php foreach ($quiz->sections as $section) { ?>
                    <div id="<?= $section->id ?>" data-next_section="<?= $quiz->sections[$j + 1]->id ?>"
                         class="game-section">
                        <?php foreach ($section->questions as $question) { ?>
                            <div id="question-<?= $i ?>" class="question-box"
                                 style="display: <?= ($i == 0) ? 'block' : 'none' ?>;">
                                <?= $question->text ?>
                            </div>
                            <?php $i++;
                        } ?>
                    </div>
                    <?php $j++;
                } ?>
            </div>
            <div class="box-footer" style=" border-top-color:#0b3e6f; background-color: #0b3e6f">
                <button id="next-question" class="btn btn-warning btn-flat">Следующий вопрос</button>
                <button id="show-section-results" class="btn btn-success btn-flat" style="display: none">К следующему туру</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-warning fade" id="rules-modal" style="display: none; background: rgb(0, 0, 0);">
    <div class="modal-dialog" style="width: 55%;">
        <div class="modal-content" style="">
            <div class="modal-body modal-picture"
                 style="height: 750px; background-image: url(/files/backgrounds/1.png); background-repeat: round">
                <div class="modal-text section-rules" style="margin-top: 15% !important; font-size: small">
                    <p>Правила тура "<?= $quiz->sections[0]->name ?>"</p>
                    <p><?= $quiz->sections[0]->rules ?></p>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="results-modal" style="display: none; background: rgb(0, 0, 0);">
    <div class="modal-dialog" style="width: 55%;">
        <div class="modal-content" style="background-color: #0b3e6f">
            <div class="modal-header" id="section-name" style="background-color: #0b3e6f !important;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h3 class="modal-title" style="background-color: #0b3e6f; font-family: Rostelecom Basis; border-top-color: #0b3e6f" ><?= $quiz->sections[0]->name ?></h3>
            </div>
            <div class="modal-body modal-picture"
                 style="height: 750px; background-image: url(/files/backgrounds/1.png); background-repeat: round">
                <div class="modal-text">
                    <p class="question-number">Вопрос №1</p>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
