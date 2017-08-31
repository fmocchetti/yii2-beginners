<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TodoLists */

$this->title = 'Update Todo Lists: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Todo Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->lid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="todo-lists-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
