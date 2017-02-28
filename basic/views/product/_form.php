<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin( ['options' => ['enctype' => 'multipart/form-data']] ); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
    <input id="productcategory-product_id" type="hidden" name="ProductCategory[product_id]" value="<?= $model->id; ?>" />
    <input id="productcategory-category_id" type="hidden" name="ProductCategory[category_id]" value="" />
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-product-price required">
        <label class="control-label" for="categories">Categories</label>
        
    </div>

    <div class="form-group field-product-price required">
        <label class="control-label" for="product-price">Quantity In Stock</label>
        <input type="number" id="product-quantity" class="form-control" name="Product[quantity]" value="<?= $model->quantity; ?>" />
        <div class="help-block"></div>
    </div>


    <?= $form->field($uploadModel, 'file')->fileInput(['maxlength' => true]) ?>

    <div class="form-group field-product-price required">
        <label class="control-label" for="categories">Categories</label>
        <select id="categories" class="form-control" required="required" multiple="multiple">
          <option></option>
          <?php foreach ($categories as $category): ?>
            
            <?php
                $selected = '';
                $categoryIds = [];
                if( is_array( $productCategory ) ){
                    foreach( $productCategory as $item )
                    {
                        if( $category->id == $item->category_id )
                        {
                            $selected = 'selected';
                            array_push($categoryIds, $category->id);
                        }
                    }
                }
            ?>
            <option value="<?= $category->id; ?>" <?= $selected; ?>><?= $category->name; ?></option>
          <?php endforeach ?>
        </select>
    </div>

    <div class="form-group form-button">
        <button id="btn-save" class="btn btn-success" type="button">
        	<i class="fa fa-plus"></i> Save
        </button>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    $categoryIds = implode(',', $categoryIds);
?>

<script type="text/javascript">
var categories_ids = '<?= $categoryIds; ?>';
</script>