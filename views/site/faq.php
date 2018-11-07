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
                                     <p class="text-sm-center my-3">Just in case you need some clarification here are some frequently asked questions we've answered.  If you cant find what you are looking for here please contact us and we'll make sure to address any questions you have.</p>
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
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion21" aria-expanded="false" aria-controls="accordion21" class="card-title faq lead">What are the different user types?</a>
					</div>
					<div id="accordion21" role="tabpanel" aria-labelledby="heading21" class="card-collapse collapse" aria-expanded="false">
						<div class="card-body">
							<div class="card-block faq">
								<p>There are 2 different user types each with their own uses.</p>
								<p><strong>A Giver:</strong> An Giver profile/user is your personal profile that you can to create
to view and connect with churches. You will be able to see “Needed Items” and
contact to support the church. Your contact info and profile will not be public or
visible to the community.</p>
								<p><strong>The church:</strong>A church profile requires the submission and verification of your
FEIN#. This user can create “donation posts” and “donation request”. You will
have full access to the community and able to share your profile publically. As a
church user your information will be public so the community can contact you
about your needs and requests.</p>
								
							</div>
						</div>
					</div>
					<div id="heading22"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion22" aria-expanded="false" aria-controls="accordion22" class="card-title faq lead collapsed">Can I create “donations” if I am not registered as a church?</a>
					</div>
					<div id="accordion22" role="tabpanel" aria-labelledby="heading22" class="card-collapse collapse" aria-expanded="false">
						<div class="card-body">
							<div class="card-block faq">
								No, only church profiles are able to create a "donations & donation requests". You are able to view these requests, contact and share to help the church.
							</div>
						</div>
					</div>
					<div id="heading23"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion23" aria-expanded="false" aria-controls="accordion23" class="card-title faq lead collapsed">Who can see my information?</a>
					</div>
					<div id="accordion23" role="tabpanel" aria-labelledby="heading23" class="card-collapse collapse" aria-expanded="false">
						<div class="card-body">
							<div class="card-block faq">
								Our community is to help those put the good and valuable items into the church.
Where church to church or member to church it’s all about the need. Therefore,
only the church profiles are public and visible to the community. Your personal
profile will not visible to others in order to respect your privacy.
							</div>
						</div>
					</div>
					<div id="heading24"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion24" aria-expanded="false" aria-controls="accordion24" class="card-title faq lead collapsed">How can I delete my posting?</a>
					</div>
					<div id="accordion24" role="tabpanel" aria-labelledby="heading24" class="card-collapse collapse" aria-expanded="false" style="height: 0px;">
						<div class="card-body">
							<div class="card-block faq">
								You can view, edit and delete your postings from your account settings view. Again only church profiles will be able to create posts at this time.
							</div>
						</div>
					</div>
					<div id="heading25"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion25" aria-expanded="false" aria-controls="accordion25" class="card-title faq lead collapsed">What are the posting rules?</a>
					</div>
					<div id="accordion25" role="tabpanel" aria-labelledby="heading25" class="card-collapse collapse" aria-expanded="false">
						<div class="card-body">
							<div class="card-block faq">
								For a list of your posting rules and guidelines review our <a class="inner-link" href="/legalstuff">Legal Stuff</a> section.
							</div>
						</div>
					</div>
					<div id="heading26"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion26" aria-expanded="false" aria-controls="accordion26" class="card-title faq lead collapsed">Are there any items we can not donate or request?</a>
					</div>
					<div id="accordion26" role="tabpanel" aria-labelledby="heading26" class="card-collapse collapse" aria-expanded="false" style="height: 0px;">
						<div class="card-body">
							<div class="card-block faq">
								Yes, there are items we are requesting not to post. Please review our list of <a class="inner-link" href="<?= Url::to('@web/prohibiteditems') ?>">Prohibited Items</a> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>