<?php

//  Protect from direct access
defined('ABSPATH') || die('Sorry!');

// One Click Buy Button Setting / Admin Options
if (!class_exists('OneClickBuyBtn_Setting')):
    class OneClickBuyBtn_Setting
    {
        public function __construct()
        {
            // Initial Action for main menu and main menu field
            add_action('admin_menu', [$this, 'one_click_buy_btn_setting_func']);
            add_action('admin_menu', [$this, 'option_form_process_func']);
        }

        public function one_click_buy_btn_setting_func()
        {
            // One Click Buy Button Sub Menu In WooCommerce Menu
            add_submenu_page(
                'woocommerce',
                'One Click Buy Button',
                'One Click Buy Button',
                'manage_woocommerce',
                'one_click_buy_btn',
                [$this, 'one_click_buy_btn_func']
            );
        }

        // Field Processing Function For Option Main Menu
        public function option_form_process_func()
        {
            // Registering Setting
            register_setting('one_click_option_group', 'one_click_option_name');

            // Check is field correct and user has permission
            if (isset($_POST['action']) && isset($_POST['option_page']) && ($_POST['option_page'] == 'one_click_option_group') && current_user_can('manage_options')) {
                // Update Options On Submit
                update_option('one_click_buy_btn_options', [
                    'power' => sanitize_text_field($_POST['power']),
                    'replace_add_to_cart' => sanitize_text_field($_POST['replace_add_to_cart']),
                    'button_text' => sanitize_text_field($_POST['button_text']),
                    'redirect_page' => sanitize_url($_POST['redirect_page']),
                    'custom_css' => sanitize_text_field($_POST['custom_css']),
                    'button_class' => sanitize_text_field($_POST['button_class']),
                ]);
            }
        }

        // One Click Buy Button Menu Content
        public function one_click_buy_btn_func()
        {
            esc_html(include 'settings/one_click_buy_btn-html.php');
        }
    }

    // Initialize Class and call
    new OneClickBuyBtn_Setting();

endif;
