<?php

namespace App\Controller;

abstract class General {
	public static $dir = "app/View/";

	function __construct($template) {
		$this->template = $template;
	}

	public function view($data, $template=false) {
		$template = $template !== false ? $template : $this->template;
		return self::view_in($data, $template);
	}

	public static function view_in($data, $template) {
		ob_start();
		extract($data);
		require_once(self::$dir . $template);
		$html = ob_get_clean();
		return $html;
	}
}
