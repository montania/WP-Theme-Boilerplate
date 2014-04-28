<?php

class OpenGraph
{

    protected static $image;
    protected static $image_width = 144;
    protected static $image_height = 144;

    public static function description()
    {
        bloginfo('description');
    }

    public static function locale()
    {
        echo str_replace('-', '_', get_bloginfo('language'));
    }

    public static function site_name()
    {
        bloginfo('name');
    }

    public static function title()
    {
        wp_title('&laquo;', true, 'right');
        bloginfo('name');
    }

    public static function type()
    {
        echo is_home() || is_front_page() ? 'website' : 'article';
    }

    protected static function load_post_thumbnail()
    {
        $thumbnail_id       = get_post_thumbnail_id();
        $image              = wp_get_attachment_image_src($thumbnail_id);
        self::$image        = $image[0];
        self::$image_width  = $image[1];
        self::$image_height = $image[2];
    }

    public static function image()
    {
        if (has_post_thumbnail()) {
            self::load_post_thumbnail();
            echo self::$image;
        } else {
            bloginfo('template_directory');
            echo '/img/apple-touch-icon-144x144.png';
        }
    }

    public static function image_width()
    {
        echo self::$image_width;
    }

    public static function image_height()
    {
        echo self::$image_height;
    }

    public static function url()
    {
        $url = 'http';

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $url .= 's';
        }

        $url .= '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        echo $url;
    }
}
