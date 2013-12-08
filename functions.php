<?php
/**
 * Main file for the WordPress Theme
 * @author    Rickard Andersson <rickard@montania.se>
 * @copyright Montania System AB
 * @version   1.2
 */

/**
 * Main class for the WordPress Theme
 * @author Rickard Andersson <rickard@montania.se>
 */
class Boilerplate {

	/**
	 * Name of the directory where the theme files resides
	 * @var string
	 * @since 1.0
	 */
	private $theme_name = 'boilerplate';

	/**
	 * Will initialize the plugin function and add some hooks
	 * @return Boilerplate
	 * @since 1.0
	 */
	function __construct() {

		add_action( 'init', array( $this, 'init_menus' ) );
		add_action( 'init', array( $this, 'init_assets' ) );
		add_action( 'init', array( $this, 'init_sidebars' ) );
	}

	/**
	 * Sets up and enqueues the scripts and styles for this theme
	 * This function will be run on initialization
	 * @return void
	 * @since 1.0
	 */
	function init_assets() {

		// Only enqueue files on the public part of the page
		if ( !is_admin() && !is_login_page() ) {

			wp_enqueue_style( $this->theme_name . '-style', get_bloginfo( 'stylesheet_directory' ) . '/style.css' );

			wp_enqueue_script( 'modernizr', get_bloginfo( 'stylesheet_directory' ) . '/js/vendor/modernizr-2.6.3.min.js' );
			//wp_enqueue_script( $this->theme_name . '-script', get_bloginfo( 'stylesheet_directory' ) . '/js/main.min.js', array( 'jquery' ), false, true );
		}
	}

	/**
	 * Sets up the theme menu(s)
	 * This function will be run on initialization
	 * @return void
	 * @since 1.0
	 */
	function init_menus() {
		register_nav_menu( 'header', 'Huvudnavigationen' );
	}

	/**
	 * Sets up the theme sidebars
	 * This function will be run on initialization
	 * @return void
	 * @since 1.0
	 */
	function init_sidebars() {

		$args = array(
			'name'          => 'Högerspalten',
			'id'            => 'sidebar',
			'description'   => 'Till h&ouml;ger om huvudinneh&aring;llet',
			'before_widget' => '<section>',
			'after_widget'  => '</section>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>'
		);

		register_sidebar( $args );
	}
}

new Boilerplate();

require 'class/opengraph.php';

/**
 * Function to get the time in 'relative format', i.e. xxx seconds/minutes/hours/... ago
 *
 * @param int $timestamp
 *
 * @return string
 * @since 1.0
 */
function relative_time( $timestamp ) {

	if ( ! is_numeric( $timestamp ) ) {
		return '';
	}

    $tz_string = get_option('timezone_string');

    if ($tz_string) {
        $tz         = new DateTimeZone($tz_string);
        $now        = new DateTime('now', $tz);
        $posted     = DateTime::createFromFormat('U', $timestamp, $tz);
    } else {
        $now        = new DateTime('now');
        $posted = DateTime::createFromFormat('U', $timestamp);
    }

    $difference = strtotime($now->format('Y-m-d H:i:s')) - strtotime($posted->format('Y-m-d H:i:s'));
	$periods    = array( 'sec', 'min', 'hour', 'day', 'week', 'month', 'year', 'decade' );

	$lengths = array( '60', '60', '24', '7', '4.35', '12', '10' );

	if ( $difference > 0 ) { // this was in the past
		$ending = 'ago';
	} else { // this was in the future
		$difference = - $difference;
		$ending     = 'to go';
	}

	for ( $j = 0; $difference >= $lengths[ $j ]; $j ++ )
		$difference /= $lengths[ $j ];

	$difference = round( $difference );

	if ( $difference != 1 )
		$periods[ $j ] .= 's';

	$text = "$difference $periods[$j] $ending";

	return $text;
}

/**
 * Function to get the time in "relative format", i.e. xxx seconds/minutes/hours/... ago
 *
 * @param int $timestamp
 *
 * @return string
 * @since 1.0
 */
function relative_time_sv( $timestamp ) {

	if ( ! is_numeric( $timestamp ) ) {
		return '';
	}

    $tz_string = get_option('timezone_string');

    if ($tz_string) {
        $tz         = new DateTimeZone($tz_string);
        $now        = new DateTime('now', $tz);
        $posted     = DateTime::createFromFormat('U', $timestamp, $tz);
    } else {
        $now        = new DateTime('now');
        $posted = DateTime::createFromFormat('U', $timestamp);
    }

    $difference = strtotime($now->format('Y-m-d H:i:s')) - strtotime($posted->format('Y-m-d H:i:s'));
	$period     = array( 'sekund', 'minut', 'timme', 'dag', 'vecka', 'm&aring;nad', '&aring;r', 'decennium' );
	$periods    = array( 'sekunder', 'minuter', 'timmar', 'dagar', 'veckor', 'm&aring;nader', '&aring;r', 'decennium' );

	$lengths = array( '60', '60', '24', '7', '4.35', '12', '10' );
	$ending  = $beginning = '';

	if ( $difference > 0 ) { // this was in the past
		$ending    = 'sedan';
		$beginning = 'för';
	} else { // this was in the future
		$difference = - $difference;
		$beginning  = 'om';
	}

	for ( $j = 0; $difference >= $lengths[ $j ]; $j ++ )
		$difference /= $lengths[ $j ];

	$difference = round( $difference );

	$unit = ( $difference == 1 ) ? $period[ $j ] : $periods[ $j ];

	$text = "$beginning $difference $unit $ending";

	return $text;
}

/**
 * Returns true if the current page is the login page
 * @return bool
 */
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}
