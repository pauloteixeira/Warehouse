<?php 

use yii\widgets\Breadcrumbs;
?>

<div class="wrap">
	<!-- BEGIN: header fix top -->
	<div class="header navbar-fixed-top">
		<div class="col-md-12">
			<div class="col-md-2 col-sm-4 col-xs-12">
				<img class="logo" src="\images\logo.png">
			</div>
			<div class="col-md-10 col-sm-4 col-xs-12 menu">
				<nav id="menu">
					<ul>
						<li><a href="/">Home</a></li>
						<?php if(!Yii::$app->user->id): ?>
							<li><a href="/login">Login</a></li>
						<?php endif; ?>
						
						<?php if(Yii::$app->user->id): ?>
							<li><a href="/category">Category</a></li>
							<li><a href="/product">Products</a></li>
							<li><a href="/user">Users</a></li>
							<li><a href="/profile">My Profile</a></li>
							<li><a href="/logout">Logout</a></li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<!-- BREADCRUMBS -->
    <div class="col-md-12">
          <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>
    </div>
