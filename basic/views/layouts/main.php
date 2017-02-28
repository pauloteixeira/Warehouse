<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$dateTime = new DateTime();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    
    <link href="/css/site.css?release=<?= $dateTime->getTimestamp(); ?>" rel="stylesheet" type="text/css">
    <link href="/vendors/pace/pace.css" rel="stylesheet" />
    <script type="text/javascript" src="/vendors/jquery/dist/jquery.min.js"></script>
    <script data-pace-options='{ "ajax": true }' src='/vendors/pace/pace.min.js'></script>
</head>
<body>
<?php $this->beginBody() ?>

<?php require_once 'header.php'; ?>
    
    
    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Warehouse <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
