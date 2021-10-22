<?php

namespace Exdda\Controllers; 

use Exdda\Controllers\Ajax\AjaxController;
use Exdda\Controllers\Meta\MetaController;
use Exdda\Controllers\SettingMenu\SettingMenuController;
use Exdda\Controllers\PostType\PostTypeController;
use Exdda\Controllers\Taxonomy\TaxonomyController;
use Exdda\Controllers\Widget\WidgetController;

class MainController {

    public function __construct() {   
        if ( is_admin() ) {
            new PostTypeController();
            new TaxonomyController();
            new MetaController();
            new WidgetController();
            new SettingMenuController();
        }
        new AjaxController();
    } 
}