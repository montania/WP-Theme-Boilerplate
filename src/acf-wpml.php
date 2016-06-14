<?php
namespace Montania\Boilerplate;

f(!defined('ABSPATH')) die();

global $wpdb;

/**
 * This class manages the configuration file for WPML Translation Management.
 *
 * NOTE:
 * This class is not active from start!
 * Remove the comment at the end of this document to activate.
 *
 * @author Robin Jensen <robin@montania.se>
 * @class ACF_WPML
 */
class ACF_WPML {

    /**
     * @var wpdb $wpdb
     */
    private $wpdb;

    function __construct($wpdb)
    {
        $this->wpdb = $wpdb;
    }

    /**
     * Add filters
     */
    public function init(){
        add_filter('acf/save_post', [$this, 'update_wpml_config'], 10, 3);
    }

    /**
     * Normalize repeater field names.
     * Removes [0-9]_ from the string.
     *
     * @param $name
     * @return mixed
     */
    public function normalize_field_name($name) {
        return preg_replace('/[0-9]+_/', '', $name);
    }

    /**
     * Find the field translation option from acf.php
     *
     * @param String $name
     * @return bool
     */
    public function get_field_translation_option($name){
        if(isset(get_field_translation_options()[$this->normalize_field_name($name)])) {
            return get_field_translation_options()[$this->normalize_field_name($name)];
        }

        return false;
    }

    /**
     * This method is run on post save when the post as ACF fields in it.
     *
     * @param $postId
     * @return bool
     */
    public function update_wpml_config($postId) {
        $keys = $this->wpdb->get_col(
            "SELECT meta_key
             FROM {$this->wpdb->postmeta}
             GROUP BY meta_key
             ORDER BY meta_key"
        );

        $tab = "    ";

        $config = [
            '<wpml-config>',
            $tab . '<custom-fields>'
        ];

        foreach ($keys as $key) {
            if(substr( $key, 0, 1 ) === '_') {
                $config[] = $tab . $tab . sprintf('<custom-field action="ignore">%s</custom-field>', $key);
            }else if($this->get_field_translation_option($key, $GLOBALS['acf_register_field_group'])){
                $config[] = $tab . $tab . sprintf('<custom-field action="translate">%s</custom-field>', $key);
            }else{
                $config[] = $tab . $tab . sprintf('<custom-field action="copy">%s</custom-field>', $key);
            }
        }

        $config[] = $tab . '</custom-fields>';

        // Set acf custom type to "Do nothing"
        $config[] = $tab . '<custom-types>';
        $config[] = $tab . $tab . '<custom-type translate="0">acf</custom-type>';
        $config[] = $tab . '</custom-types>';

        $config[] = '</wpml-config>';

        $file = dirname(__FILE__) . '/../wpml-config.xml';

        $result = @file_put_contents($file, join(PHP_EOL, $config));

        return !!$result;
    }

}

// add_action('init', [new ACF_WPML($wpdb), 'init']);