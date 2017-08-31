<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TodoItems */

$this->title = 'Update Todo Items: ' . $model->iid;
$this->params['breadcrumbs'][] = ['label' => 'Todo Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iid, 'url' => ['view', 'id' => $model->iid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="todo-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
