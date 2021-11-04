<?php

//  Protect from direct access
defined('ABSPATH') || die('Sorry!');

// OneClickBuyBtn_Enqueue Script & Style For full Plugin

if (!class_exists('OneClickBuyBtn_Enqueue')):
    class OneClickBuyBtn_Enqueue
    {
        public function __construct()
        {
            // Initialize Script for client
            add_action('wp_enqueue_scripts', [__CLASS__, 'one_click_buy_btn_enqueue_func']);

            // Check is admin and Initialize Script for admin
            if (is_admin()) {
                add_action('admin_enqueue_scripts', [__CLASS__, 'admin_one_click_buy_btn_enqueue_func']);
            }
        }

        public static function one_click_buy_btn_enqueue_func()
        {
            // Purged Tailwind CSS For Client
            wp_enqueue_style('tailwindCSS', plugin_dir_url(__DIR__).'assets/css/tailwindPurged.css');

            // Custom CSS For Client
            wp_enqueue_style('customCSS', plugin_dir_url(__DIR__).'assets/css/custom.css');
        }

        public static function admin_one_click_buy_btn_enqueue_func()
        {
            // Custom CSS For Admin
            wp_enqueue_style('customCSS', plugin_dir_url(__DIR__).'assets/css/custom.css');

            // Purged Tailwind CSS For Admin
            wp_enqueue_style('tailwindCSS', plugin_dir_url(__DIR__).'assets/css/tailwindPurged.css');
        }
    }

    new OneClickBuyBtn_Enqueue();
endif;
