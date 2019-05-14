<?php
/**
 * @var \yii\web\View $this
 * @var \common\models\User[] $dump
 */

$this->title = 'Подсчет результатов'
?>
<?php foreach ($dump as $user) { ?>
<div class="user-results">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $user->username ?></h3>
                </div>
                <div class="box-body">
                    <?php foreach ($user->dump as $question) { ?>
                        <dl>
                            <dt style="font-size: small"><?= $question->info->text ?></dt>
                            <?php if ($question->info->type == 1) { ?>
                                <?php foreach ($question->answers as $answer) { ?>
                                    <dd><?= $answer->answer->text ?>  <?= ($answer->is_right) ? '+' : '-' ?></dd>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($question->info->type == 2) { ?>
                                <?php foreach ($question->answers as $answer) { ?>
                                    <dd>Ответ: <?= $answer->text ?></dd>
                                <?php } ?>
                            <?php } ?>
                        </dl>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
