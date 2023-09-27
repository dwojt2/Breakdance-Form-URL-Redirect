<?php
// FILE 2 - custom-action.php - Custom Action
class CustomAction extends \\Breakdance\\Forms\\Actions\\Action {
    
    public function name() {
        return 'My Custom Action';
    }

    public function slug() {
        return 'my_custom_action';
    }

    public function run($form, $settings, $extra) {
        $field_id = $settings['field_id'];
        $base_url = $settings['base_url'];
        $invalid_url_message = $settings['invalid_url_message'] ?? 'Invalid URL entered.';
        
        if (isset($form[$field_id]['value'])) {
            $url = $base_url . $form[$field_id]['value']; 
        } else {
            return ['type' => 'error', 'message' => $invalid_url_message]; 
        }
        
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            wp_redirect($url, 301); 
            exit;
        } else {
            return ['type' => 'error', 'message' => $invalid_url_message]; 
        }
    }
}
