<?php

namespace Exdda\Controllers\Taxonomy;

use Exdda\Controllers\Taxonomy\Types\ProjectCategory;
use Exdda\Controllers\Taxonomy\Types\SponsorLevel;
use Exdda\Controllers\Taxonomy\Types\Year;

class TaxonomyController {
	
	public function __construct() {  
		new ProjectCategory();
		new Year();
		new SponsorLevel();
	} 
}