<?php
/**
 * Sidebar Template for displaying sidebars 
 *
 * @package ysorganic
 */
?>
<div class="blog__sidebar">
    <?php     
    if(is_active_sidebar("blog-sidebar")){
        dynamic_sidebar("blog-sidebar");
    }
?>
</div>