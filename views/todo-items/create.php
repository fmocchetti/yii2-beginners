<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TodoItems */

$this->title = 'Create Todo Items';
$this->params['breadcrumbs'][] = ['label' => 'Todo Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
