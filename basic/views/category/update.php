<?php

use yii\helpers\Html;
use app\assets\CategoryAsset;
use app\components\StringUtils;


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = Yii::t('app', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

CategoryAsset::register($this);
?>
<div id="top" class="content">
	<div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="bottom-30px"></div>
        <div id="alert" class="alert alert-danger alert-dismissible fade in" role="alert" style="display:none;">
          <button type="button" class="close" aria-label="Close" onclick="$('#alert').hide('slow')">
            <span aria-hidden="true">×</span>
          </button>
          <strong>Ops!!!<br /></strong>
          <ul id="error_msg"></ul>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">

        	<div class="x_panel">
		        <div class="x_title">
		          <h1><?= Html::encode($this->title) ?></h1>
		          <ul class="nav navbar-right panel_toolbox">
		            <li class="dropdown">
		              <a href="/category" class="dropdown-toggle" role="button" title="Back"><i class="fa fa-arrow-left"></i> Back</a>
		            </li>
		            <li class="dropdown">
		              <a href="/" class="dropdown-toggle" role="button" title="<?= Yii::t('app','Go home'); ?>"><i class="fa fa-home"></i> Home</a>
		            </li>
		          </ul>
		          <div class="clearfix"></div>
		        </div>
		        <div class="x_content">
    				<?= $this->render('_form', [ 'model' => $model, ]) ?>
				</div>
      		</div> <!-- end: div x-panel -->
		</div>
	</div>
</div>

