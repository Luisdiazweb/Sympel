<?php

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */

$this->title = "How it Works - Sympel";

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
                                    <h3 class="section-title my-3 text-xs-center">Frequently Asked Questions </h3>
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
        <div class="col-lg-12">
			<div id="accordionWrap2" role="tablist" aria-multiselectable="true">
				<div class="card collapse-icon accordion-icon-rotate left">
					<div id="heading21"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion21" aria-expanded="true" aria-controls="accordion21" class="card-title faq lead">How can I do something?</a>
					</div>
					<div id="accordion21" role="tabpanel" aria-labelledby="heading21" class="card-collapse collapse in" aria-expanded="true">
						<div class="card-body">
							<div class="card-block faq">
								Caramels dessert chocolate cake pastry jujubes bonbon. Jelly wafer jelly beans. Caramels chocolate cake liquorice cake wafer jelly beans croissant apple pie. Oat cake brownie pudding jelly beans. Wafer liquorice chocolate bar chocolate bar liquorice. Tootsie roll gingerbread gingerbread chocolate bar tart chupa chups sugar plum toffee. Carrot cake macaroon sweet danish. Cupcake soufflé toffee marzipan candy canes pie jelly-o. Cotton candy bonbon powder topping carrot cake cookie caramels lemon drops liquorice. Dessert cookie ice cream toffee apple pie.
							</div>
						</div>
					</div>
					<div id="heading22"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion22" aria-expanded="false" aria-controls="accordion22" class="card-title faq lead collapsed">How can I do something?</a>
					</div>
					<div id="accordion22" role="tabpanel" aria-labelledby="heading22" class="card-collapse collapse" aria-expanded="false">
						<div class="card-body">
							<div class="card-block faq">
								Sugar plum bear claw oat cake chocolate jelly tiramisu dessert pie. Tiramisu macaroon muffin jelly marshmallow cake. Pastry oat cake chupa chups. Caramels marshmallow carrot cake topping donut sesame snaps toffee tootsie roll. Lollipop sweet jelly beans oat cake biscuit pastry chocolate cake. Cupcake chocolate biscuit lemon drops cotton candy marshmallow oat cake donut. Croissant chocolate cake oat cake brownie topping carrot cake jelly beans. Dessert gingerbread marshmallow pudding donut lemon drops cake. Cake topping gummi bears cake. 
							</div>
						</div>
					</div>
					<div id="heading23"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion23" aria-expanded="false" aria-controls="accordion23" class="card-title faq lead collapsed">How can I do something?</a>
					</div>
					<div id="accordion23" role="tabpanel" aria-labelledby="heading23" class="card-collapse collapse" aria-expanded="false">
						<div class="card-body">
							<div class="card-block faq">
								Candy cupcake sugar plum oat cake wafer marzipan jujubes lollipop macaroon. Cake dragée jujubes donut chocolate bar chocolate cake cupcake chocolate topping. Dessert jelly beans toffee muffin tiramisu sesame snaps brownie. Cake halvah pastry soufflé oat cake candy candy canes. Lemon drops gummies gingerbread toffee. Tart jelly candy pastry. Pastry cake jelly beans carrot cake marzipan lollipop muffin. Soufflé jujubes cupcake. Powder danish candy carrot cake pastry. Tart marshmallow caramels cake macaroon gummies lollipop.
							</div>
						</div>
					</div>
					<div id="heading24"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion24" aria-expanded="false" aria-controls="accordion24" class="card-title faq lead collapsed">How can I do something?</a>
					</div>
					<div id="accordion24" role="tabpanel" aria-labelledby="heading24" class="card-collapse collapse" aria-expanded="false" style="height: 0px;">
						<div class="card-body">
							<div class="card-block faq">
								Sesame snaps chocolate lollipop sesame snaps apple pie chocolate cake sweet roll. Dragée candy canes carrot cake chupa chups danish cake sugar plum candy. Cake powder biscuit bear claw. Sesame snaps cotton candy cheesecake topping ice cream cookie tiramisu. Liquorice bonbon cookie pie halvah. Cookie toffee ice cream cotton candy lollipop fruitcake. Tart cheesecake tiramisu danish marzipan pie pastry chocolate cake. Pastry bonbon lollipop oat cake pastry halvah dessert jelly. Toffee caramels croissant apple pie chupa chups toffee muffin chupa chups apple pie.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>