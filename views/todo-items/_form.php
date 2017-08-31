<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TodoLists;

/* @var $this yii\web\View */
/* @var $model app\models\TodoItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todo-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'todo_list_id')->dropdownList(TodoLists::find()->select(['title'])->indexBy('lid')->column(),['prompt'=>'Select Todo List']); ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
