<?php

namespace App\Controller;
use App\Controller\General as GeneralController;

class Home extends GeneralController {
	function __construct($template) {
		parent::__construct($template);
		// other stuff here
	}

	static function generate_for($x = 1, $to = 10) {
		$out = [];
		for($i=1; $i<=$to; $i++) {
			$out[] = [
				$x,
				$i,
				($x * $i)
			];
		}
		return $out;
	}

	function generate () {
		$data = $this->generate_for(5);
		return $data;
	}
}
