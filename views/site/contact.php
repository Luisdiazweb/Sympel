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
                    <div class="card-body collapse in my-3">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <h3 class="section-title my-3 text-xs-center">Contact Us </h3>
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

   <div class="row mb-3">
   		<div class="container">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">

					</div>
					<div class="card-body collapse in">
						<div class="card-block">
							<div class="card-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate porro esse repellat quo exercitationem debitis incidunt.</p>
							</div>
							<form class="form">
								<div class="form-body">
								
										<div class="form-group">
											
											<input type="text" id="eventRegInput1" class="form-control" placeholder="Full Name" name="fullname">
										</div>
								
										<div class="form-group">
										
											<input type="email" id="eventRegInput4" class="form-control" placeholder="Email" name="email">
										</div>
									
										<div class="form-group">
							
											<input type="text" id="eventRegInput2" class="form-control" placeholder="Company" name="company">
										</div>
									
										<div class="form-group">
										
										<textarea id="issueinput8" rows="5" class="form-control" name="message" placeholder="Your Message" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"></textarea>
									</div>
										

								</div>

								<div class="text-xs-center">
									<button type="submit" class="btn button-primary btn-l">
										Send Message
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<p>Contact Information:</p>
		    </div>
		</div>
	</div>


   


  
