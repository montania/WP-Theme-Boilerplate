<?php
namespace Montania\Boilerplate;

if(!defined('ABSPATH')) die();

/**
 * Class Mailer
 *
 * Helper class to send a email with the theme template
 */
class Mailer
{
    public function send($recipient, $subject, $content)
    {
        $siteName = get_bloginfo('name');

        ob_start();
        require get_template_directory() . '/template/email_template.php';
        $body = ob_get_clean();

        return wp_mail($recipient, $subject . ' - ' . $siteName, $body, $this->get_headers());
    }

    /**
     * @return string
     */
    protected function get_headers()
    {
        $from    = get_option('admin_email');
        $headers = "Content-type: text/html;charset=utf-8\r\n";
        $headers .= 'From: ' . $from . "\r\n";
        return $headers;
    }
}