<section class="user_profile">
	<div class="container">
		<div class="col-xs-12 col-sm-3">
			<img src="http://placehold.it/150x175" alt="" class="img-responsive profile_picture">
			<div class="profile_options">
				<h3 class="option"><a href="#">Edit Profile</a></h3>
				<h3 class="option"><a href="#">Edit Settings</a></h3>
				<h3 class="option"><a href="#">History</a></h3>
				<h3 class="option"><a href="#">Menu Item</a></h3>
			</div>
			<div class="col-xs-12 col-no-padding">
				<button type="button" class="btn btn1_profile">Some Button</button>
			</div>
			<div class="col-xs-12 col-no-padding">
				<button type="button" class="btn btn2_profile">Some Button</button>
			</div>
		</div>
		<div class="col-xs-12 col-sm-9 profile_needs">
			<h3 class="title col-xs-12">Open Needs</h3>
			<?php for ($i = 0; $i < 3; $i++): ?>
			    <div class="col-xs-6 col-md-4 col-lg-4 need_item">
			        <img src="http://placehold.it/250x200" alt="" class="img-responsive">
			        <div class="box-info col-xs-12">
			            <h3 class="name">Name of need</h3>
			            <div class="col-xs-12 col-sm-6 category">
			                <a href="#">Category</a>
			            </div>
			            <div class="col-xs-12 col-sm-6 options">
			                <a class="follow" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
			                <a class="message" href="#"><i class="fa fa-comment" aria-hidden="true"></i></a>
			                <a class="share" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
			            </div>
			        </div>
			    </div>
			<?php endfor; ?>
			<hr class="col-xs-12">
			<h3 class="title col-xs-12">Needs I’m Following</h3>
			<?php for ($i = 0; $i < 3; $i++): ?>
			    <div class="col-xs-6 col-md-4 col-lg-4 need_item">
			        <img src="http://placehold.it/250x200" alt="" class="img-responsive">
			        <div class="box-info col-xs-12">
			            <h3 class="name">Name of need</h3>
			            <div class="col-xs-12 col-sm-6 category">
			                <a href="#">Category</a>
			            </div>
			            <div class="col-xs-12 col-sm-6 options">
			                <a class="follow" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
			                <a class="message" href="#"><i class="fa fa-comment" aria-hidden="true"></i></a>
			                <a class="share" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
			            </div>
			        </div>
			    </div>
			<?php endfor; ?>
			<hr class="col-xs-12">
			<h3 class="title col-xs-12">My Connections</h3>
			<div class="col-xs-12 col-md-10 connections">
				<?php for ($i = 0; $i < 8; $i++): ?>
				    <img src="http://placehold.it/150x175" alt="" class="img-responsive profile_picture">
				<?php endfor; ?>
			</div>
		</div>
	</div>
</section>