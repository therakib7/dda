<?php

namespace Exdda\Controllers\SettingMenu;

use Exdda\Controllers\SettingMenu\Menus\Exporter;
use Exdda\Controllers\SettingMenu\Menus\ReOrder;

class SettingMenuController {

	public function __construct() {   
		new Exporter();
		new ReOrder();
	} 
}