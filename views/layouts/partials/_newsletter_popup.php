
<!-- Modal -->
<div class="modal fade" id="newsletter-modal" tabindex="-1" role="dialog" aria-labelledby="newsletter-modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="mc_embed_signup">
            <form action="https://sympel.us17.list-manage.com/subscribe/post?u=<?php print Yii::$app->params['mailchimp_key'] ?>&id=<?php print Yii::$app->params['mailchimp_list'] ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <h3 class="section-title ">Sign Up for the Sympel Newsletter</h3>
                    <div class="mc-field-group">
                        <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                    </label>
                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>   
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_<?php print Yii::$app->params['mailchimp_key'] ?>_<?php print Yii::$app->params['mailchimp_list'] ?>" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn button-secondary button-options"></div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="/sympel-assets/js/mc-validate.js"></script>
<script src="/sympel-assets/js/mc-custom.js"></script>