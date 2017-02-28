<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\assets\CategoryAsset;
use app\components\StringUtils;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;

CategoryAsset::register($this);
?>


<div id="top" class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="x_panel">
                <div class="x_title">
                  <h1><?= Html::encode($this->title) ?></h1>
                  <ul class="nav navbar-right panel_toolbox">
                    <li class="dropdown">
                      <a href="<?= StringUtils::currentUrl(true); ?>/create" class="dropdown-toggle" role="button" title="New"><i class="fa fa-plus"></i> New</a>
                    </li>
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" role="button" title="<?= Yii::t('app','Go home'); ?>"><i class="fa fa-home"></i> Home</a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?php Pjax::begin(); ?>    <?= GridView::widget([
                          'dataProvider' => $dataProvider,
                          'columns' => [
                              'id',
                              'name',

                              ['class' => 'yii\grid\ActionColumn'],
                          ],
                      ]); ?>
                  <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>