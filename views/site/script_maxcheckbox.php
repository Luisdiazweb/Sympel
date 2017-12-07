<?php
/* @var $this View */

use yii\web\View;

$this->registerJs('$(".JS_limit").on("ifChecked",function(e){
            var checkboxes = $("input.JS_limit");
            var $this=$(this);
            if (checkboxes.filter(":checked").length > 3) {
                alert(\'Max limit reached\');
                setTimeout(function(){
                    $this.iCheck(\'uncheck\');
                },1);
            }
        });', View::POS_END);
?>