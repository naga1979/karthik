<?php

// Porto Sticky
add_shortcode('porto_sticky', 'porto_shortcode_sticky');
add_action('vc_after_init', 'porto_load_sticky_shortcode');

function porto_shortcode_sticky($atts, $content = null) {
    ob_start();
    if ($template = porto_shortcode_template('porto_sticky'))
        include $template;
    return ob_get_clean();
}

function porto_load_sticky_shortcode() {
    $animation_type = porto_vc_animation_type();
    $animation_duration = porto_vc_animation_duration();
    $animation_delay = porto_vc_animation_delay();
    $custom_class = porto_vc_custom_class();

    vc_map( array(
        "name" => "Porto " . __("Sticky", 'porto-shortcodes'),
        "base" => "porto_sticky",
        "category" => __("Porto", 'porto-shortcodes'),
        "icon" => "porto_vc_sticky",
        "as_parent" => array('except' => 'porto_sticky'),
        "content_element" => true,
        "controls" => "full",
        //'is_container' => true,
        'js_view' => 'VcColumnView',
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Container Selector", 'porto-shortcodes'),
                "param_name" => "container_selector",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => __("Min Width (unit: px)", 'porto-shortcodes'),
                "param_name" => "min_width",
                "description" => __("Wll be disable sticky if window width is smaller than min width", 'porto-shortcodes'),
                "value" => "767"
            ),
            array(
                "type" => "textfield",
                "heading" => __("Top (unit: px)", 'porto-shortcodes'),
                "param_name" => "top",
                "description" => __("Top position when active", 'porto-shortcodes'),
                "value" => "110"
            ),
            array(
                "type" => "textfield",
                "heading" => __("Bottom (unit: px)", 'porto-shortcodes'),
                "param_name" => "bottom",
                "description" => __("Bottom position when active", 'porto-shortcodes'),
                "value" => "0"
            ),
            array(
                "type" => "textfield",
                "heading" => __("Active Class", 'porto-shortcodes'),
                "param_name" => "active_class",
                "value" => "sticky-active"
            ),
            $custom_class,
            $animation_type,
            $animation_duration,
            $animation_delay
        )
    ) );

    if (!class_exists('WPBakeryShortCode_Porto_Sticky')) {
        class WPBakeryShortCode_Porto_Sticky extends WPBakeryShortCodesContainer {
        }
    }
}