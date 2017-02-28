<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\ProductAsset;
use app\components\StringUtils;


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = Yii::t('app', 'Product Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

ProductAsset::register($this);
?>
<div class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="x_panel">
                <div class="x_title">
                  <h1><?= Html::encode($this->title) ?></h1>
                  <ul class="nav navbar-right panel_toolbox">
                    <li class="dropdown">
                      <a id="delete-link" name="<?= $model->id; ?>" class="dropdown-toggle delete" role="button" title="Back"><i class="fa fa-ban"></i> Delete</a>
                    </li>
                    <li class="dropdown">
                      <a href="/product" class="dropdown-toggle" role="button" title="Back"><i class="fa fa-arrow-left"></i> Back</a>
                    </li>
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" role="button" title="<?= Yii::t('app','Go home'); ?>"><i class="fa fa-home"></i> Home</a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'name',
                            'description',
                            'price',
                            'image',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODALS -->
<div id="modal-confirm" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="modal-title"><?= Yii::t('app','Atention'); ?></h4>
        </div>
        <div class="modal-body" id="modal-body"><?= Yii::t('app','Are you sure you want to delete this item?'); ?></div>
        <div class="modal-footer">
          <button id="no" type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app','Cancel'); ?></button>
          <button id="yes" type="button" class="btn btn-primary"><?= Yii::t('app','Yes'); ?></button>
        </div>

      </div>
    </div>
</div>