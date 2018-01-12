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
                                <div class="col-md-10 offset-md-1">
                                    <h3 class="section-title my-3 text-xs-center">Prohibited Items Guidelines</h3>
                                     <p class="text-sm-center my-3">Before posting, please read the Prohibited Items list below to ensure that your items are allowed to posted or requested. Additionally, please review our Posting Rules and Community Guidelines. For items that may be subject to regulatory restrictions, it's a good idea to make sure your item is legal to post before posting on sympel. Any item that requires a license to transfer or donate is not the responsibility of sympel and we advise to avoid posting such items. Our Prohibited Items Guidlenie is a guide but it is up to the user to ensure their item is meeting all regulatory transfer requirements.</p>
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
			<h3 class="section-title mt-1 mb-1">Alcohol, drugs, tobacco, and related products</h3>
			<ul>
				<li>Alcohol</li>
				<li>Prescription drugs</li>
				<li>Drugs, narcotics, or controlled substances (even those that are legal in some states)</li>
				<li>Items marketed for the purpose of intoxication</li>
				<li>Drug paraphernalia such as bongs, vaporizers, and pipes</li>
				<li>Tobacco and related products, including e-cigarettes, e-juice, vaporizers, mods, hookahs, and hookah accessories</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Adult & Mature Content</h3>
			<ul>
				<li>Explicit sexual content or nudity</li>
				<li>Pornography</li>
				<li>Adult toys</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Animals & Animal Products</h3>
			<ul>
				<li>Pets and other live animals</li>
				<li>Animal products derived from endangered or threatened species</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Counterfeit or Replica Items</h3>
			<ul>
				<li>Counterfeits, fakes, and replicas of brand-name items, including items “inspired” by a brand without permission of the owner</li>
				<li>Bootlegged or unauthorized recordings</li>
				<li>Pirated copies of any copyrighted materials</li>
				<li>Use of a trademark or other implied affiliation with a brand</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Dangerous Items</h3>
			<ul>
				<li>Firearms, no exceptions.</li>
				<li>Knives primarily used as weapons or for self-defense. Note: Cutlery, kitchen, and utility knives are generally permitted</li>
				<li>Sporting weapons such as bows and arrows, crossbows, and archery items</li>
				<li>Swords, if sharpened or functional. <strong>Note:</strong> Decorative blunt swords are generally permitted</li>
				<li>Weapon parts and accessories, including any item that attaches to a firearm, ammunition, bullets, clips, arrows, and bolts</li>
				<li>Body armor, including Kevlar and other tactical and protective vests, except protective clothing for sporting activities</li>
				<li>Hazardous Materials such as:
					<ul>
						<li>Fireworks</li>
						<li>Explosives</li>
					</ul>
				</li>
				<li>Recalled Items
					<ul>
						<li>Items subject to recall</li>
						<li>Items deemed to pose significant health or safety risks to others</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Food Items</h3>
			<ul>
				<li>Most perishable goods, including meat, seafood, dairy, and cut fruits or vegetables</li>
				<li>Homemade shelf products, such as jams, jellies, and pickles</li>
				<li>Homemade meals or baked goods</li>
				<li>Eggs sold outside of the seller's far</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Illegal Items or Encouraging Illegal Activities</h3>
			<p>Any item that is illegal or that encourages illegal activity is not allowed, including but not limited to:</p>
			<ul>
				<li>Stolen or found goods</li>
				<li>Items received through Government Assistance</li>
				<li>Fake or forged documents (such as licenses, IDs, diplomas, and government-issued documents)</li>
				<li>Offers to trade for illegal goods</li>
				<li>Police or Security badges or uniforms. These items can be used to impersonate an officer or gain access to secure areas.</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Intangible Items & Services</h3>
			<ul>
				<li>Services for made-to- order items such as custom food items and flowers</li>
				<li>Services for intangible items such as dog walking, babysitting, and IT support</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Advertisements</h3>
			<ul>
				<li>Links to or information about flea markets, yard sales, and garage sales</li>
				<li>URLs or links to websites</li>
				<li>Rentals and timeshares</li>
				<li>Multi-level marketing schemes and related promotional materials</li>
				<li>Job postings</li>
				<li>Lost pet ads</li>
				<li>Automotive financing</li>
			</ul>
		</div>
		<div class="col-md-12">
			<h3 class="section-title mt-3 mb-1">Medical & Healthcare Items</h3>
			<ul>
				<li>Devices, drugs, and medications that require a prescription from a licensed medical practitioner (such as a dentist, doctor, optometrist, or veterinarian)</li>
				<li>Pills, vitamins, and supplements</li>
				<li>Contact lenses</li>
				<li>Used cosmetics</li>
				<li>Used makeup sponges and applicators</li>
				<li>Needles and items containing needles (such as syringes or tattoo equipment)</li>
			</ul>
		</div>
		<div class="col-md-12 mb-3">
			<h3 class="section-title mt-3 mb-1">Offensive Materials</h3>
			<ul>
				<li>Posts containing racial slurs</li>
				<li>Posts promoting intolerance or discrimination</li>
				<li>Items that promote, support, or commemorate groups with views of hatred or intolerance (for example Nazi, Neo-Nazi, or KKK groups)</li>
				<li>Items that depict or glorify violence against people or animals</li>
			</ul>
			<p>For additional restrictions on behavior such as profanity and harassment, please see <a href="#">Community Guidelines.</a></p>
		</div>
	</div>