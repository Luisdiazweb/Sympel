<section class="user_need_overview">
	<div class="container container_need_overview">
		<button type="button" class="btn btn_edit_need">Edit</button>
	    <div class="col-xs-6">
	        <img src="http://placehold.it/500x500" alt="" class="img-responsive">
	    </div>
	    <div class="col-xs-6 need_information">
	        <h1 class="name">NAME OF NEED</h1>
	         <p class="col-xs-9 col-no-padding">
	            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
	        </p>
	        <div class="col-xs-12 col-sm-4 col-no-padding options-category">
	            <div class="col-xs-12 col-sm-6 col-no-padding options">
	                <a class="follow" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
	                <a class="message" href="#"><i class="fa fa-comment" aria-hidden="true"></i></a>
	                <a class="share" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
	            </div>
	            <div class="col-xs-12 col-sm-6 category">
	                <a href="#">Category</a>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<section class="other_needs">
	<div class="container">
		<h3 class="title col-xs-12">My Other Needs</h3>
		<?php for ($i = 0; $i < 4; $i++): ?>
            <div class="col-xs-6 col-md-4 col-lg-3 need_item">
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
	</div>
</section>