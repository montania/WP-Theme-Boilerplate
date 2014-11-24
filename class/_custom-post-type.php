<?php

abstract class CustomPostType
{
    protected $post;

    public function __construct($post)
    {
        $this->post = $post instanceof WP_Post ? $post : get_post($post);
    }

    public function __get($key)
    {
        return $this->post->$key;
    }

    public function __toString()
    {
        return "{$this->post->ID}";
    }

    /**
     * Returns all posts of this post type
     *
     * @return array
     */
    static function all()
    {
        $class    = self::get_class();
        $postType = self::get_post_type();

        $args = array(
            'post_type'   => $postType,
            'numberposts' => -1,
        );

        $posts  = get_posts($args);
        $posts  = array_filter($posts, [$class, 'wpml_filter']);
        $result = [];

        foreach ($posts as $post) {
            $result[] = new $class($post);
        }

        return $result;
    }

    /**
     * Returns all posts with the featured meta key set to true
     *
     * @param array $args
     *
     * @return array
     */
    static function featured($args = ['count' => 5, 'require_image' => false])
    {
        $filterImages = function ($post) {
            return has_post_thumbnail($post->ID);
        };

        $class        = self::get_class();
        $postType     = self::get_post_type();
        $count        = $args['count'];
        $requireImage = $args['require_image'];

        $args = array(
            'post_type'   => $postType,
            'numberposts' => $count,
            'meta_key'    => 'featured',
            'meta_value'  => true,
        );

        $posts = get_posts($args);
        $posts = array_filter($posts, [$class, 'wpml_filter']);

        if ($requireImage) {
            $posts = array_filter($posts, $filterImages);
        }

        $result = [];

        foreach ($posts as $post) {
            $result[] = new $class($post);
        }

        $found = count($result);

        if ($found < $count) {
            $result = array_merge($result, $class::all());
            $result = array_unique($result);

            if ($requireImage) {
                $result = array_filter($result, $filterImages);
            }

            if (count($result) > $count) {
                $result = array_slice($result, 0, $count);
            }
        }

        return $result;
    }

    /**
     * Filter out posts which is not for the current language
     *
     * @param WP_Post $post
     *
     * @return bool
     */
    static function wpml_filter(WP_Post $post)
    {
        // WPML not active
        if (!function_exists('icl_object_id')) {
            return true;
        }

        $postType      = self::get_post_type();
        $icl_object_id = icl_object_id($post->ID, $postType);

        // Post type not translated
        if ($icl_object_id === null) {
            return true;
        }

        // If match, it's the current language
        return $icl_object_id == $post->ID;
    }


    /**
     * @return string
     */
    protected static function get_class()
    {
        $class = get_called_class();
        return $class;
    }

    /**
     * @return string
     */
    protected static function get_post_type()
    {
        $class = self::get_class();

        $postType = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $class));

        return $postType;
    }
}