<?php

namespace Exdda\Controllers\PostType;

use Exdda\Controllers\PostType\Types\AdvisoryMember;
use Exdda\Controllers\PostType\Types\Invoice;
use Exdda\Controllers\PostType\Types\Jurygroup;
use Exdda\Controllers\PostType\Types\Project;
use Exdda\Controllers\PostType\Types\Sponsor;
use Exdda\Controllers\PostType\Types\Ticket;

class PostTypeController {
	
	public function __construct() {  
        new Jurygroup();
        new Project();
		new Sponsor();
		new Invoice();
		new Ticket();
		new AdvisoryMember();
	} 
}