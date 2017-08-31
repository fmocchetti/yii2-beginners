<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TodoItems */

$this->title = $model->iid;
$this->params['breadcrumbs'][] = ['label' => 'Todo Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'todo_list_id',
            'content',
            'created_at',
            'updated_at',
            'completed_at',
            'iid',
        ],
    ]) ?>

</div>
