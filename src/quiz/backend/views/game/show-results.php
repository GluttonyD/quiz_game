<?php
/**
 * @var \yii\web\View $this
 * @var \common\models\QuizResult[] $results
 */

$this->title='Результаты игры!'
?>

<div class="row">
    <div class="col-md-offset-2 col-md-5">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Таблица очков</h3>
            </div>
            <div class="box-body">
                <?php foreach ($results as $result){ ?>
                    <p>Результат команды <?= $result->user_id ?>: <?= $result->result ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
