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
<div class="howitworks2">
    <div class="container-fluid box-1">
        <div class="row">
            <div class="col-md-6 left">
                <h1>HOW IT WORKS</h1>
                <img src="/app-assets/images/computer-howitworks.png" alt="How it works" />
            </div>
            <div class="col-md-6 right">
                <div class="content">
                    <h3>Needs based giving for churches ... simple.</h3>
                    <p>We know that you have stuff you need to get your job done so we've created an easy way for you to list, share and post your needs. Now its not always about getting because the world goes around when we give. So, we have made it easy for you to find other church needs and support their too. :)</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid box-2">
        <h3>Giving made simple</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="little-box">
                    <p class="title">Sign Up</p>
                    <p class="paragrah">Free sign up and profile creation instanlly allows you to create or request donatable items.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="little-box">
                    <p class="title">Sign Up</p>
                    <p class="paragrah">Free sign up and profile creation instanlly allows you to create or request donatable items.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="little-box">
                    <p class="title">Sign Up</p>
                    <p class="paragrah">Free sign up and profile creation instanlly allows you to create or request donatable items.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid box-3">
        <div class="row">
            <div class="col-md-6 left">
                <img src="/app-assets/images/phone-howitworks.png" alt="Mobile friendly for giving on the go" />
            </div>
            <div class="col-md-6 right">
                <p class="title">Mobile friendly for giving on the go</p>
                <p class="paragraph">Super responsive and easy layout makes it simple to post or search on the go. You'll see we cut out all the extra to make giving, well sympel.</p>
                <button class="btn btn-signup">SIGN UP</button>
            </div>
        </div>
    </div>
    <div class="container-fluid box-4">
        <div class="row">
            <div class="col-md-6 left">
                <div class="content">
                    <h3>Not a church but want to help?</h3>
                    <h4>Don't worry we got you covered.</h4>
                </div>
            </div>
            <div class="col-md-6 right">
                <p>Like us you just want to help make an impact and give to the world. Sure no problem, we have a special profile for anyone that wants to browse the needs of Churches in their area and get involved.</p>
                <p>Maybe you just want to donate knowing its not an offering bucket. Find your church and see what they need. Contact and give the item ... easy.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid box-5">
        <div class="row">
            <div class="col">
                <p>"In everything I did, I showed you that by this kind of hard work we must help the weak, remembering the words the Lor Jesus himself said: 'It is more blessed to give than to receive.'"</p>
                <p class="act">Acts 20:35</p>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="container-fluid">
    <div class="row equal center">
        <div class="col-md-6 bg-primary cta-box block1">
        <h4 class="box-tag">For Everyone</h4>
        <h3>Be a Giver</h3>
        <p>
            Just like you we hate waste and love giving. Who said money was the only way to help your church community. The church needs you more than you can imagine. Find what items are in need and give where it counts. No cost, just giving!
        </p>
        <?php if(Yii::$app->user->isGuest) : ?>
            <p class="text-xs-center"><a href="<?= Url::to('@web/signup1') ?>" class="btn">I'm Ready</a></p>
        <?php endif; ?>
        </div>
        <div class="col-md-6 bg-secondary cta-box">
        <h4 class="box-tag">For Churches</h4>
        <h3>One Church Family</h3>
        <p>
            God never said his work was going to be easy, we get that. We know in your growth you are always looking for things to help your church. That's what the sympel community is about; helping fulfill your needs where it counts. Create donation requests and tell the community what you need. Be a part of the giving community and help other churches.
        </p>
        <?php if(Yii::$app->user->isGuest) : ?>
            <p class="text-xs-center"><a href="<?= Url::to('@web/signup1') ?>" class="btn">Let's Go</a></p>
        <?php endif; ?>
        </div>
    </div>
    </div>
</section>