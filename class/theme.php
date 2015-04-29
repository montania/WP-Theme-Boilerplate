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
        add_action('wp_dashboard_setup', [$this, 'add_theme_info'] );
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
        $revisionFile = dirname(__FILE__) . '/../revision.php';

        if (file_exists($revisionFile)) {
            require $revisionFile;
        } else {
            define('ASSETS_VERSION', 'dev');
        }

        // Only enqueue files on the public part of the page
        if (!is_admin() && !is_login_page()) {

            wp_enqueue_style(
                $this->theme_name . '-style',
                get_bloginfo('template_directory') . '/style.css',
                array(),
                ASSETS_VERSION
            );

            wp_enqueue_script('modernizr', get_bloginfo('template_directory') . '/js/vendor/modernizr-2.6.3.min.js');
            // wp_enqueue_script(
            // 	$this->theme_name . '-script',
            // 	get_bloginfo('template_directory') . '/js/main.min.js',
            // 	array('jquery'),
            // 	ASSETS_VERSION,
            // 	true
            // );

            if (is_child_theme()) {
                wp_enqueue_style(
                    $this->theme_name . '-child-style',
                    get_bloginfo('stylesheet_directory') . '/style.css',
                    array($this->theme_name . '-style'),
                    ASSETS_VERSION
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
        register_nav_menu('header', __('The main navigation', 'montania')); // Huvudnavigationen
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
            'name'          => __('The right column', 'montania'), // Högerspalten
            'id'            => 'sidebar',
            'description'   => __('To the right of the main content', 'montania'), // Till höger om huvudinnehållet
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h1 class="widgettitle">',
            'after_title'   => '</h1>'
        );

        register_sidebar($args);
    }

    /**
     * Sets up a information panel in WP Dashboard.
     *
     * @return void
     */
    public function add_theme_info()
    {
        wp_add_dashboard_widget('theme-information', 'Information', [$this, 'theme_info']);
    }

    /**
     * The content to show in the information panel.
     *
     * @return void
     */
    public function theme_info()
    {
        ?>
        <b>Temat är skapat av Montania System AB</b>
        <p>
            <b>Användbara länkar:</b><br>
            - <a href="http://tdh.se/bok/webbpublicering-med-wordpress/">Webbpublicering med WordPress</a><br>
        </p>
        <p><b>För support:</b><br>
            Skicka e-post till <a href="mailto:wpsupport@montania.se>">wpsupport@montania.se</a><br>
            Ring på telefon <a href="tel:035-13 68 00">035-13 68 00</a></p>
    <?php
    }
}

new Boilerplate();