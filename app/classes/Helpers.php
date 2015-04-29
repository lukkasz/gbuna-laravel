<?php

class Helpers {
	public static function seoURL($string) {
		// Lower case everthing
		$string = strtolower($string);
		// Conver č,ć,š,ž,đ to c,s,z,d
		$search = array('ć','č','š','ž','đ');
		$replacement = array('c','c','s','z','d');
		$string = str_replace($search, $replacement, $string);
		//Make alphanumeric (remove all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/","", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespace and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
}