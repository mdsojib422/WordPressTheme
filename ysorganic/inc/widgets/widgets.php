<?php
class ys_regisger_widgets
{
    function __construct()
    {
        if (file_exists(YSORGA_PATH . '/inc/widgets/search-widgets.php')) {
            require_once(YSORGA_PATH . '/inc/widgets/search-widgets.php');
        }
    }
}

new ys_regisger_widgets();
