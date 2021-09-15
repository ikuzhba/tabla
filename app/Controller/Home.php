<?php

namespace App\Controller;
use App\Controller\General as GeneralController;

class Home extends GeneralController {
	function __construct($template) {
		parent::__construct($template);
		// other stuff here
	}

	function generate_for($x = 1, $to = 10) {
		$out = [];
		for($i=1; $i<=$to; $i++) {
			$out[] = [
				'a' => $x,
				'b' => $i,
				'c' => ($x * $i)
			];
		}
		return $out;
	}

	function generate () {
		$data = $this->generate_for(5);
		return $data;
	}
}
