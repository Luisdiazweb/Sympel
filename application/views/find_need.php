<section class="search_bar">
	<div class="container">
		<div class="col-xs-12 col-sm-6">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
			  <input type="text" class="form-control" placeholder="Type a Keyword" aria-describedby="basic-addon1">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon2"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
			  <input type="text" class="form-control" placeholder="Filter by need type(s)" aria-describedby="basic-addon1" data-role="tagsinput" >
			</div>
		</div>
	</div>
</section>
<section class="found_needs">
    <div class="needs container">
        <?php for ($i = 0; $i < 16; $i++): ?>
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