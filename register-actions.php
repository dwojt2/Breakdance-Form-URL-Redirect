<?php
/**
 * Plugin Name: Breakdance Form URL Redirect
 * Description: A custom WordPress plugin for checking and redirecting URLs from Breakdance forms.
 * Version: 1.0.1
 * Author: Dominik Wojtysiak
 * Author URI: https://wojtysiak.one/about/
 */

// FILE 1 - register-actions.php - Register Custom Action
add_action('init', function() { 
    if (!function_exists('\\Breakdance\\Forms\\Actions\\registerAction') || !class_exists('\\Breakdance\\Forms\\Actions\\Action')) {
        return;
    }
    
    require_once(plugin_dir_path(__FILE__) . 'custom-action.php'); 
    
    Breakdance\\Forms\\Actions\\registerAction(new CustomAction());
});

require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/dwojt2/Breakdance-Form-URL-Redirect/',
	__FILE__,
	'unique-plugin-or-theme-slug'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');