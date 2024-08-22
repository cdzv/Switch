<?php
/*
Plugin Name: Toggle Switch
Description: Un plugin para añadir un toggle switch personalizable.
Version: 1.0
Author: Danilo Zuluaga
*/

function toggle_switch_enqueue_styles() {
    wp_enqueue_style('toggle-switch-css', plugins_url('style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'toggle_switch_enqueue_styles');

function toggle_switch_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'label' => 'Toggle',
        ),
        $atts,
        'toggle_switch'
    );
    
    $unique_id = 'switch_' . $atts['label'];
    
    ob_start();
    ?>
    <div class="toggle-switch">
        <input type="checkbox" id="<?php echo esc_attr($unique_id); ?>" name="<?php echo esc_attr($unique_id); ?>" />
        <label for="<?php echo esc_attr($unique_id); ?>"><?php echo esc_html($atts['label']); ?></label>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('toggle_switch', 'toggle_switch_shortcode');


