<?php

/**
 * Plugin Name: One Click Buy Button For WooCommerce
 * Plugin URI: https://shahriarahmed.me/plugins/one-click-buy-button
 * Author: Shahriar Ahmed Shovon
 * Author URI: https://shahriarahmed.me/
 * Description: A plugin to replace "Add To Cart" button redirect page & text. Also add "Buy Now" button aside "Add To Cart" with custom link & text.
 * Version: 1.0.0
 * Tags: woocommerce one click checkout, one click checkout, one click buy button, woocommerce cart and checkout on same page, woocommerce direct checkout, direct checkout woocommerce plugin
 * License: GPL V2
 * Text Domain: one-click-buy-button.
 */

//  Protect from direct access
defined('ABSPATH') || die('Sorry!');

//  Add setting options when plugin is activating.
register_activation_hook(__FILE__, 'one_click_buy_btn_register_func');

function one_click_buy_btn_register_func()
{
    if (!get_option('one_click_buy_btn_options')) {
        add_option('one_click_buy_btn_options', [
       'power' => 1,
       'replace_add_to_cart' => 0,
       'button_text' => 'Buy Now',
       'redirect_page' => 'checkout',
       'custom_css' => '',
       'button_class' => 'single_add_to_cart_button one_click_buy_btn_button',
      ]);
    }
}

// Include Files ( Enqueue & Setting )
include plugin_dir_path(__FILE__).'includes/one_click_buy_btn-enqueue.php';
include plugin_dir_path(__FILE__).'includes/one_click_buy_btn-setting.php';

// Check if option is set and plugin is on from setting
if (isset(get_option('one_click_buy_btn_options')['power']) && get_option('one_click_buy_btn_options')['power'] == 1) {
    // Variable 'add_to_cart'
    $replace_add_to_cart = get_option('one_click_buy_btn_options')['replace_add_to_cart'];

    // Check is replace add_to_cart set or not
    if ($replace_add_to_cart == '1') {
        include plugin_dir_path(__FILE__).'includes/one_click_buy_btn-replace-addCart.php';
    } else {
        include plugin_dir_path(__FILE__).'includes/one_click_buy_btn-buy-now.php';
    }
}
