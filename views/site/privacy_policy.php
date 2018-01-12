<?php

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */

$this->title = "Privacy Policy - Sympel";

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
                                    <h3 class="section-title my-3 text-xs-center">Privacy Policy </h3>
                                     <p class="text-sm-center my-3">This policy details how data about you is used when you access our websites and services (together,"sympel") or interact with us.</p>
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
		<div class="col-md-12">
			<h3 class="section-title mt-1 mb-1">Protecting Your Privacy</h3>
			<ul>
				<li>We take precautions to prevent unauthorized access to or misuse of data about you.</li>
				<li>We do not run ads.</li>
				<li>We do not share your data with third parties for marketing purposes.</li>
				<li>We do not engage in cross-marketing or link-referral programs.</li>
				<li>We do not employ tracking devices for marketing purposes.</li>
				<li>We do not send you unsolicited communications for marketing purposes.</li>
				<li>We do not engage in affiliate marketing (and prohibit it on sympel).</li>
				<li>We do provide email proxy & relay services to reduce unwanted email.</li>
				<li>Please review privacy policies of any third party sites linked to from sympel.</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Data We Use </h3>
			<ul>
				<li>Data you post on or send via sympel, and/or send us directly or via other sites.</li>
				<li>Data you submit or provide (e.g. name, address, email, phone, photos, tax ID).</li>
				<li>Web log data (e.g. web pages viewed, access times, IP address, HTTP headers).</li>
				<li>Data collected via cookies (e.g. search data and "favorites" lists).</li>
				<li>Data about your device(s) (e.g. screen size, DOM local storage, plugins).</li>
				<li>Data from 3rd parties (e.g. phone type, geo-location via IP address).</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Data We Store </h3>
			<ul>
				<li>We retain data as needed for our business purposes and/or as required by law.</li>
				<li>We make good faith efforts to store data securely, but can make no guarantees.</li>
				<li>You may access and update certain data about you via your account login.</li>
			</ul>
		</div>
		<div class="col-md-12 mb-3">
			<h3 class="section-title mt-3 mb-1">Circumstances Which We May Disclose User Data </h3>
			<ul>
				<li>To vendors and service providers working on our behalf.</li>
				<li>To respond to subpoenas, search warrants, court orders, or other legal process.</li>
				<li>To protect our rights, property, or safety, or that of users of sympel or the general public.</li>
				<li>With your consent (e.g. if you authorize us to share data with other users).</li>
				<li>In connection with a merger, bankruptcy, or sale/transfer of assets.</li>
				<li>In aggregate/summary form, where it cannot reasonably be used to identify you.</li>
			</ul>
		</div>
	</div>