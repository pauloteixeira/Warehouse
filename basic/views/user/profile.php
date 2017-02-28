<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\UserAsset;
use app\components\StringUtils;


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = Yii::t('app', 'My Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

UserAsset::register($this);
?>
<div class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="x_panel">
                <div class="x_title">
                  <h1><?= Html::encode($this->title) ?></h1>
                  <ul class="nav navbar-right panel_toolbox">
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
                            'email:email',
                            'username',
                            'is_active',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>