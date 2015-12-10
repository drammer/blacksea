<?php
/**
 * Created by PhpStorm.
 * User: drammer
 * Date: 19.11.15
 * Time: 17:11
 */
?>
<div class="col-xs-12 bottom-sidebar">
                <?php if( ! dynamic_sidebar()):?>
    <?php if(function_exists('dynamic_sidebar')) dynamic_sidebar('bottom-sidebar'); ?>
<?php endif; ?>
</div>