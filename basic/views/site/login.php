<?php

  use app\assets\AppAsset;
  use yii\bootstrap\ActiveForm;
  /* @var $this yii\web\View */

  AppAsset::register($this);
  $this->title = Yii::t('app', 'Authentication');
?>
<div class="content">
    <?php if( Yii::$app->session->hasFlash("error")) : ?>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong><?= Yii::t('app', 'Authentication Fail!'); ?></strong>
        <?= Yii::$app->session->getFlash("error"); ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<div id="login-content">
  <div class="login center-block">
    <h2>Autenticação</h2>
    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
      <label for="username" class="control-label sr-only"><?= Yii::t('app','Username'); ?></label>
      <div class="col-sm-12">
        <div class="input-group">
          <input type="text" name="LoginForm[username]" placeholder="username" id="loginform-username" class="form-control">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div>
      </div>
    </div>

    <label for="password" class="control-label sr-only"><?= Yii::t('app','Password'); ?></label>
    <div class="form-group">
      <div class="col-sm-12">
        <div class="input-group">
          <input type="password" name="LoginForm[password]" placeholder="password" id="loginform-password" class="form-control">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        </div>
      </div>
    </div>

    <label class="fancy-checkbox">
      <div class="bottom-10px"></div>
      <!-- ?= $form->field($model, 'rememberMe')->checkbox()->label(false) ?-->
      <input type="hidden" name="LoginForm[rememberMe]" value="0">
      <input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked>
      <span><?= Yii::t('app', 'Remember me next time'); ?></span>
      <div class="bottom-10px"></div>
    </label>
    <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-sign-in"></i>  <?= Yii::t('app','Login!'); ?></button>
    <?php ActiveForm::end(); ?>
    <div class="login-links">
      <br />
      <p><a href="#"><?= Yii::t('app','Forgot Username or Password?'); ?></a></p>
      <p><a href="#"><?= Yii::t('app','Create New Account'); ?></a></p>
    </div>
  </div>
</div>
</div>






