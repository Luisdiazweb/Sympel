<section class="public_profile">
    <div class="container">
        <div class="col-xs-12 col-sm-6 col-md-4">
        	<div class="info_profile">
        		<img src="http://placehold.it/150x200" alt="" class="img-responsive">
        		<h3>Non Profit Name</h3>
        		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolvAenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec</p>
        	</div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-7 col-md-offset-1">
            <div class="tabs_info">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Tab Title</a></li>
                    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Tab Title</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Tab Title</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tab1">...</div>
                    <div role="tabpanel" class="tab-pane fade" id="tab2">...</div>
                    <div role="tabpanel" class="tab-pane fade" id="tab3">...</div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="profile_open_needs">
	<div class="container">
		<h3 class="title col-xs-12">Open Needs</h3>
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