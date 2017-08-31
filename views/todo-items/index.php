<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TodoItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todo Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Todo Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'todo_list_id',
            'value' => function ($data) {
                $list = \app\models\TodoLists::findOne($data->todo_list_id);
                return $list->title;
            },
            'label' => 'ToDo List'
            ],
            'content',
            [
                'class' => 'yii\grid\ActionColumn',
                 'template' => '{complete} {delete}',
                 'buttons' => [
                     'complete' => function($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-ok"></span>',
                            ['todo-items/complete', 'id' => $model->iid ], 
                            [
                                'title' => 'Complete',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ]

            ],
        ],
    ]); ?>
</div>
