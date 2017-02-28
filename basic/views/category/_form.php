<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\CategoryAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */

CategoryAsset::register($this);
?>

<div class="category-form">

    <?php $form = ActiveForm::begin( ['options' => ['id' => 'categoryForm'],] ); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <div class="form-group form-button">
        <button id="btn-save" class="btn btn-success" type="button">
        	<i class="fa fa-plus"></i> Save
        </button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
