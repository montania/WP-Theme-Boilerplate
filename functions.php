<?php 


class Boilerplate {
	
	private $plugin_name = "boilerplate";
	
	function __construct() {
		
		// Only enqueue files on the public part of the page 
		if ( !is_admin() ) {
			
			wp_enqueue_style($this->plugin_name . '-style', get_bloginfo( 'stylesheet_directory') . "/style.css");

			wp_enqueue_script('modernizr',  get_bloginfo("stylesheet_directory") . "/js/libs/modernizr-2.0.6.min.js");
			wp_enqueue_script($this->plugin_name . '-plugins', get_bloginfo("stylesheet_directory") . "/js/plugins.js", array('jquery'), false, true);
			wp_enqueue_script($this->plugin_name . '-script', get_bloginfo("stylesheet_directory") . "/js/script.js", array('jquery', $this->plugin_name . '-plugins'), false, true);
		}
	}
}

add_action("init", create_function('', '$a = new Boilerplate();'));

/**
 * Function to get the time in "relative format", i.e. xxx seconds/minutes/hours/... ago
 * @param int $timestamp
 * @return string 
 * @since 1.0
 */
function relative_time ($timestamp) {
	
    if (!is_numeric($timestamp)) {
            return;
    }	
	
	$difference = time() - $timestamp;
	$periods = array("sec", "min", "hour", "day", "week","month", "year", "decade");
	
	$lengths = array("60","60","24","7","4.35","12","10");
	
	if ($difference > 0) { // this was in the past
		$ending = "ago";
	} else { // this was in the future
		$difference = -$difference;
		$ending = "to go";
	}
	
	for($j = 0; $difference >= $lengths[$j]; $j++)
		$difference /= $lengths[$j];
	
	$difference = round($difference);
	
	if($difference != 1) 
		$periods[$j] .= "s";
	
	$text = "$difference $periods[$j] $ending";
	
	return $text;
}