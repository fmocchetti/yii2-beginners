<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TodoListsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todo Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-lists-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Todo Lists', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description',
            [
                'class' => 'yii\grid\ActionColumn',
                 'template' => '{items} {update} {delete} ',
                 'buttons' => [
                     'items' => function($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon glyphicon-th-list"></span>',
                            ['todo-items/index', 'id' => $model->lid ], 
                            [
                                'title' => 'View Items',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ]

            ],


        ],
    ]); ?>
</div>
