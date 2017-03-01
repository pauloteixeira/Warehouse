<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\StringUtils;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

AppAsset::register($this);
$this->title = Yii::t('app', 'Errors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="top" class="content">
    <h1 class="error_status_code">404</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="errorSummary">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bottom-30px"></div>
                    <div id="alert" class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" aria-label="Close" onclick="$('#alert').hide('slow')">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong>Ops!!!<br /></strong>
                      <p><strong>Message:</strong> <?= $message; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                <p class="error_text"><strong>Sorry </strong>We can't find that page!</p>
                </div>
            </div>
        </div>
    </div>
</div>

