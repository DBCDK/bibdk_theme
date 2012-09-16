<?php
	
// Render a template with a set of variables
function render($template, $vars = array()){
 	ob_start();
 	extract($vars);
 	include('templates/' . $template . '.php');
}


// Format array of tags as links
function format_tags($tags) {

	$elements = array();

	foreach ($tags as $tag) {
		$elements[] = '<a href="#">' . $tag . '</a>';
	}

	$output = implode('&nbsp;/&nbsp;', $elements);

	return $output;
}



?>