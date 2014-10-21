<?php

/**
 * Main class for the WordPress Theme
 *
 * @author Rickard Andersson <rickard@montania.se>
 */
class Boilerplate
{
    /**
     * Name of the directory where the theme files resides
     *
     * @var string
     * @since 1.0
     */
    private $theme_name = 'boilerplate';

    /**
     * Will initialize the plugin function and add some hooks
     *
     * @return Boilerplate
     * @since 1.0
     */
    public function __construct()
    {
        add_action('init', array($this, 'init_menus'));
        add_action('init', array($this, 'init_assets'));
        add_action('init', array($this, 'init_sidebars'));
    }

    /**
     * Sets up and enqueues the scripts and styles for this theme
     * This function will be run on initialization
     *
     * @return void
     * @since 1.0
     */
    public function init_assets()
    {
        require dirname(__FILE__) . '/../revision.php';

        // Only enqueue files on the public part of the page
        if (!is_admin() && !is_login_page()) {

            wp_enqueue_style(
                $this->theme_name . '-style',
                get_bloginfo('template_directory') . '/style.css',
                array(),
                ASSET_REVISION
            );

            wp_enqueue_script('modernizr', get_bloginfo('template_directory') . '/js/vendor/modernizr-2.6.3.min.js');
            // wp_enqueue_script(
            // 	$this->theme_name . '-script',
            // 	get_bloginfo('template_directory') . '/js/main.min.js',
            // 	array('jquery'),
            // 	ASSET_REVISION,
            // 	true
            // );

            if (is_child_theme()) {
                wp_enqueue_style(
                    $this->theme_name . '-child-style',
                    get_bloginfo('stylesheet_directory') . '/style.css',
                    array($this->theme_name . '-style'),
                    ASSET_REVISION
                );
            }
        }
    }

    /**
     * Sets up the theme menu(s)
     * This function will be run on initialization
     *
     * @return void
     * @since 1.0
     */
    public function init_menus()
    {
        register_nav_menu('header', 'Huvudnavigationen');
    }

    /**
     * Sets up the theme sidebars
     * This function will be run on initialization
     *
     * @return void
     * @since 1.0
     */
    public function init_sidebars()
    {
        $args = array(
            'name'          => 'Högerspalten',
            'id'            => 'sidebar',
            'description'   => 'Till h&ouml;ger om huvudinneh&aring;llet',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h1 class="widgettitle">',
            'after_title'   => '</h1>'
        );

        register_sidebar($args);
    }
}

new Boilerplate();