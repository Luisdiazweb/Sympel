<?php

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */

$this->title = "Press - Sympel";

$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/vertical-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/plugins/forms/checkboxes-radios.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerJsFile("@web/app-assets/js/scripts/forms/checkbox-radio.js",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);


?>


    <section id="validation mt-3">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="">
                    <div class="card-body collapse in mt-3">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <h3 class="section-title my-3 text-xs-center">Press </h3>
                                     <p class="text-sm-center my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem.</p>
                                    <!--END OF CHECKBOX AREA-->
                                </div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<div class="container">
        <div class=" col-lg-12">
			<div class="card">
				<div class="card-body collapse in">
					<div class="card-block">
						<div class="media-list">
							<div class="media">
								<a class="media-left" href="#">
									<img class="media-object" src="../../../app-assets/images/portrait/small/avatar-s-3.png" alt="Generic placeholder image" style="width: 64px;height: 64px;" />
								</a>
								<div class="media-body">
									<h4 class="media-heading">Cookie candy</h4>
									Cookie candy dragée marzipan gingerbread pie pudding. Brownie fruitcake wafer bonbon gummi bears apple pie. Brownie lemon drops chocolate cake donut croissant cotton candy.
								</div>
							</div>
							<div class="media">
								<a class="media-left" href="#">
									<img class="media-object" src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="Generic placeholder image" style="width: 64px;height: 64px;" />
								</a>
								<div class="media-body">
									<h4 class="media-heading">Tootsie roll dessert </h4>
									Tootsie roll dessert tart candy canes ice cream gingerbread cookie. Jelly jelly-o bear claw bear claw halvah. Biscuit icing pastry tootsie roll gingerbread croissant chupa chups. 
								</div>
							</div>
							<div class="media">
								<a class="media-left" href="#">
									<img class="media-object" src="../../../app-assets/images/portrait/small/avatar-s-13.png" alt="Generic placeholder image" style="width: 64px;height: 64px;" />
								</a>
								<div class="media-body">
									<h4 class="media-heading">Lemon drops ice cream</h4>
									Lemon drops ice cream chocolate cake marzipan ice cream. Gummi bears cotton candy cheesecake tootsie roll. Candy sweet cake. Tiramisu cookie toffee donut.
								</div>
							</div>
						</div>
					</div>
					</div>
			</div>
		</div>
	</div>