<?php

//  Protect from direct access
defined('ABSPATH') || die('Sorry!');

// OneClickBuyBtn_ReplaceAddCart Class
if (!class_exists('OneClickBuyBtn_ReplaceAddCart')) :
    class OneClickBuyBtn_ReplaceAddCart
    {
        public function __construct()
        {
            // Initialize skip_woo_cart, zpd_remove_wc_loop_add_to_cart_button, zpd_replace_wc_add_to_cart_button & cw_btntext_cart
            add_filter('woocommerce_add_to_cart_redirect', [$this, 'skip_woo_cart']);
            add_action('init', [$this, 'zpd_remove_wc_loop_add_to_cart_button']);
            add_action('woocommerce_after_shop_loop_item', [$this, 'zpd_replace_wc_add_to_cart_button']);
            add_filter('woocommerce_product_single_add_to_cart_text', [$this, 'cw_btntext_cart']);
        }

        // Remove Default "Add To Cart" button from product page/archive
        public function zpd_remove_wc_loop_add_to_cart_button()
        {
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        }

        // Create Default "Add To Cart" button in product page/archive
        public function zpd_replace_wc_add_to_cart_button()
        {
            global $product;

            // Current Product ID From Product
            $current_product_id = get_the_ID();

            // Button Text From Options
            $button_text = get_option('one_click_buy_btn_options')['button_text'];

            // Redirect Page From Options
            $link = get_option('one_click_buy_btn_options')['redirect_page'];

            // Output Button
            echo do_shortcode('<a href="'.esc_url($link).'?add-to-cart='.esc_attr($current_product_id).'" data-quantity="1" class="button add_to_cart_button" data-product_id="'.esc_attr($current_product_id).'" data-product_sku="" aria-label="Add “Demo” to your cart" rel="nofollow">'.esc_attr($button_text).'</a>');
        }

        // Skip Cart And Replace with "Redirect Page"
        public function skip_woo_cart()
        {
            // Redirect Page From Options
            $redirect_page = get_option('one_click_buy_btn_options')['redirect_page'];

            return esc_url_raw($redirect_page);
        }

        // Change "Add To Cart" button text
        public function cw_btntext_cart()
        {
            // Button Text From Options
            $button_text = get_option('one_click_buy_btn_options')['button_text'];

            return __($button_text, 'woocommerce');
        }
    }
    new OneClickBuyBtn_ReplaceAddCart();
endif;
