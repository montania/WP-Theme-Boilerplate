<?php
namespace Montania\Boilerplate;

if (!defined('ABSPATH')) die();

/**
 * Class CustomPage
 *
 * Helper class to render a specific template at a custom URL
 */
class CustomPage
{
    private $url;
    private $tag;
    private $template;

    public function __construct($url, $id, $template = 'index.php')
    {
        $this->url      = $url;
        $this->tag      = '_custom_page_' . $id;
        $this->template = $template;

        add_action('init', array($this, 'init_rewrite'));
        add_action('template_redirect', array($this, 'template_redirect'));
    }

    public function init_rewrite()
    {
        add_rewrite_rule($this->url . '/?$', 'index.php?' . $this->tag . '=1', 'top');
        add_rewrite_tag('%' . $this->tag . '%', '1');
    }

    public function template_redirect()
    {
        if ($this->is_active()) {
            add_filter('template_include', array($this, 'template_include'));
        }
    }

    public function template_include()
    {
        return get_template_directory() . '/' . $this->template;
    }

    public function is_active()
    {
        return get_query_var($this->tag) == 1;
    }
}