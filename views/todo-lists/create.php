<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TodoLists */

$this->title = 'Create Todo Lists';
$this->params['breadcrumbs'][] = ['label' => 'Todo Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-lists-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
