<?php
/**
 * Plugin Name: Breakdance Form URL Redirect
 * Description: A custom WordPress plugin for checking and redirecting URLs from Breakdance forms.
 * Version: 1.0.0
 * Author: Dominik Wojtysiak
 * Author URI: https://wojtysiak.one/about/
 */

// FILE 1 - register-actions.php - Register Custom Action
add_action('init', function() { 
    if (!function_exists('\\Breakdance\\Forms\\Actions\\registerAction') || !class_exists('\\Breakdance\\Forms\\Actions\\Action')) {
        return;
    }
    
    require_once(plugin_dir_path(__FILE__) . 'custom-action.php'); 
    
    \\Breakdance\\Forms\\Actions\\registerAction(new CustomAction());
});
