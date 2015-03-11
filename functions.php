<?php
/**
 * Main file for the WordPress Theme
 *
 * @author    Rickard Andersson <rickard@montania.se>
 * @copyright Montania System AB
 * @version   1.2
 */

// Load acf and class files
require 'acf.php';

foreach (glob(dirname(__FILE__) . '/class/*.php') as $file) {
    require_once $file;
}

/**
 * Function to get the time in 'relative format', i.e. xxx seconds/minutes/hours/... ago
 *
 * @param int $timestamp
 *
 * @return string
 * @since 1.0
 */
function relative_time($timestamp)
{

    if (!is_numeric($timestamp)) {
        return '';
    }

    $tz_string = get_option('timezone_string');

    if ($tz_string) {
        $tz     = new DateTimeZone($tz_string);
        $now    = new DateTime('now', $tz);
        $posted = DateTime::createFromFormat('U', $timestamp, $tz);
    } else {
        $now    = new DateTime('now');
        $posted = DateTime::createFromFormat('U', $timestamp);
    }

    $difference = strtotime($now->format('Y-m-d H:i:s')) - strtotime($posted->format('Y-m-d H:i:s'));

    $lengths = array('60', '60', '24', '7', '4.35', '12', '10');
    $text = '';

    if ($difference > 0) { // this was in the past
        $text = __('%1$s %2$s ago', 'montania');
    } else { // this was in the future
        $difference = -$difference;
        $text = __('in %1$s %2$s', 'montania');
    }

    for ($j = 0; $difference >= $lengths[$j]; $j++) {
        $difference /= $lengths[$j];
    }

    $difference = round($difference);

    $periods = array(
        _n('second', 'seconds', $difference, 'montania'),
        _n('minute', 'minutes', $difference, 'montania'),
        _n('hour', 'hours', $difference, 'montania'),
        _n('day', 'days', $difference, 'montania'),
        _n('week', 'weeks', $difference, 'montania'),
        _n('month', 'months', $difference, 'montania'),
        _n('year', 'years', $difference, 'montania'),
        _n('decade', 'decades', $difference, 'montania')
    );

    return sprintf($text, $difference, $periods[$j]);
}

/**
 * Returns true if the current page is the login page
 *
 * @return bool
 */
function is_login_page()
{
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

/**
 * Returns excerpt for post
 *
 * @param int $post_id
 * @param int $excerpt_length
 *
 * @return string
 */
function get_excerpt_by_id($post_id, $excerpt_length = 55)
{
    $the_post    = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_excerpt ? $the_post->post_excerpt : $the_post->post_content; //Gets post_content to be used as a basis for the excerpt

    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');

    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $the_excerpt = wp_trim_words($the_excerpt, $excerpt_length, $excerpt_more);
    $the_excerpt = wpautop($the_excerpt);

    return $the_excerpt;
}
