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
              <div class="col-md-3">
                <div class="product-img">
                    <img width="270px" height="300px" src="/images/products/<?= $model->image; ?>" alt=""/>
                </div>
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="product-info">
                      <h2 class="product-title">
                          <?= $model->name; ?>
                      </h2>
                      <div class="in-stock">
                          <p><?= ($model->quantity) ? $model->quantity . '  In Stock' : 'Out of Stock'; ?></p>
                      </div>
                      <h3 class="pro-price">€ <?= $model->price; ?></h3>
                  </div>
                </div>
                <div class="row">
                  <span><?= nl2br($model->description); ?></span>
                </div>
                <br />
              </div>

              <div class="row">

                  <nav id="category-list">
                    <ul>
                      <?php foreach( $categories as $category ): ?>
                        <li><a href="/<?= $category->id; ?>"><?= $category->name; ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                  </nav>
                </div>
        </div>
    </div>
</div>