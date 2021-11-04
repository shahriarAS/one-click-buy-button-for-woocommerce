<?php

//  Protect from direct access
defined('ABSPATH') || die('Sorry!');

// OneClickBuyBtn_BuyNow Class
if (!class_exists('OneClickBuyBtn_BuyNow')):
class OneClickBuyBtn_BuyNow
{
    public function __construct()
    {
        // Initalize add_button_after_addtocart Function when plugin is on
        add_action('woocommerce_after_add_to_cart_button', [$this, 'add_button_after_addtocart']);
    }

    public function add_button_after_addtocart()
    {
        // Button Text & Custom CSS From Options
        $button_text = get_option('one_click_buy_btn_options')['button_text'];
        $custom_css = get_option('one_click_buy_btn_options')['custom_css'];
        $button_class = get_option('one_click_buy_btn_options')['button_class'];

        // get the current post/product ID
        $current_product_id = get_the_ID();

        // get the product based on the ID
        $product = wc_get_product($current_product_id);

        // get the "Checkout Page" URL
        $page_url = get_option('one_click_buy_btn_options')['redirect_page'];

        // run only on simple products
        if ($product->is_type('simple')) {
            echo do_shortcode('<a name="add-to-cart" style="'.esc_html($custom_css).'" href="'.esc_url($page_url).'?plugin=one-click-buy-button&add-to-cart='.esc_attr($current_product_id).'" class="button alt '.esc_attr($button_class).'">'.esc_attr($button_text).'</a>');
        }
    }
}
new OneClickBuyBtn_BuyNow();
endif;
