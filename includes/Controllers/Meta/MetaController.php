<?php

namespace Exdda\Controllers\Meta; 

use Exdda\Controllers\Meta\Taxonomy\ProjectCategory;
use Exdda\Controllers\Meta\Types\AdvisoryBoard;
use Exdda\Controllers\Meta\Types\Invoice;
use Exdda\Controllers\Meta\Types\Jurygroup;
use Exdda\Controllers\Meta\Types\Page;
use Exdda\Controllers\Meta\Types\Project;
use Exdda\Controllers\Meta\Types\Sponsor;
use Exdda\Controllers\Meta\Types\Ticket;
use Exdda\Controllers\Meta\User\User;

class MetaController {

	public function __construct() {   

		//post meta
		new Page();
		new Jurygroup();
		new Project();
		new Sponsor();
		new Invoice();
		new Ticket();
		new AdvisoryBoard();

		//taxonomy meta
		new ProjectCategory(); 

		//user meta
		new User();
	} 
}