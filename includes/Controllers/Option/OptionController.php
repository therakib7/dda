<?php

namespace Exdda\Controllers\Option;
 
use Exdda\Controllers\Option\Types\Option;
use Exdda\Controllers\Option\Types\SpecialPriser;

class OptionController {
	
	public function __construct() {    
		new Option(); 
		new SpecialPriser();
	} 
}