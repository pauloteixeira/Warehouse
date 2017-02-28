<?php

/* @var $this yii\web\View */

$this->title = 'Home';

if( $categoryName )
{
    $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['/']];
    $this->params['breadcrumbs'][] = $categoryName;
}
else
{
    $this->params['breadcrumbs'][] = 'Products';
}

?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div clas="row">
                <div class="col-md-10">
                
                    <?php foreach($products as $product ): ?>
                        <!-- product-item start -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="/products/<?= $product->id; ?>">
                                        <img width="270px" height="300px" src="/images/products/<?= $product->image; ?>" alt=""/>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="/products/<?= $product->id; ?>"><?= $product->name; ?></a>
                                    </h6>
                                    <div class="in-stock">
                                        <p><?= ($product->quantity) ? $product->quantity . '  In Stock' : 'Out of Stock'; ?></p>
                                    </div>
                                    <h3 class="pro-price">€ <?= $product->price; ?></h3>
                                </div>
                            </div>
                        </div>
                        <!-- product-item end -->
                    <?php endforeach; ?>
                </div>
                <div class="col-md-2">
                    <!-- widget-categories -->
                    <aside class="widget widget-categories box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">Categories</h6>
                        <div id="cat-treeview" class="product-cat">
                            <ul class="ul-menu">
                                <?php foreach( $categories as $category ): ?>
                                <li><a href="/<?= $category->id; ?>"><?= $category->name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
