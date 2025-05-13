<?php
/**
 * Plugin Name: Landing Generator
 * Description: A simple plugin to generate landing pages with ACF fields.
 * Version: 1.0.0
 * Author: Deiv
 * Text Domain: landing-generator
 * Domain Path: /languages
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/vendor/autoload.php';

add_action('plugins_loaded', function () {
    load_plugin_textdomain('landing-generator', false, basename(__DIR__) . '/languages');
    (new \Landing\Generator\Plugin())->init();
});