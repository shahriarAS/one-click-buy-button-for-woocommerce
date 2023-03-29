

<div class="wrap one_click_buy_btn">
    <section
        class="one_click_buy_btn-w-full one_click_buy_btn-p-6 one_click_buy_btn-mx-auto one_click_buy_btn-bg-gray-800 one_click_buy_btn-rounded-md one_click_buy_btn-shadow-md dark:one_click_buy_btn-bg-gray-800 one_click_buy_btn-m-0 one_click_buy_btn-div"
        >
        <!-- Setting Page Title -->
        <h1 class="one_click_buy_btn-text-xl one_click_buy_btn-font-bold one_click_buy_btn-text-white one_click_buy_btn-capitalize dark:one_click_buy_btn-text-white">
            One Click Buy Button Setting
        </h1>
        <!-- Form Error/Success Card Alert -->
        <?php settings_errors(); ?>
        <form action="options.php" method="POST">
            <!-- Wordpress Field Group -->
            <?php settings_fields('one_click_option_group'); ?>
            <div class="one_click_buy_btn-grid one_click_buy_btn-grid-cols-1 one_click_buy_btn-gap-6 one_click_buy_btn-items-center one_click_buy_btn-mt-4 md:one_click_buy_btn-grid-cols-2">
                <!-- On/Off One Click Buy Button Input -->
                <div>
                    <label class="one_click_buy_btn-text-white dark:one_click_buy_btn-text-gray-200" for="button_text"
                        >On/Off One Click Buy Button</label
                        >
                    <div class="toggle one_click_buy_btn-mt-2 one_click_buy_btn-bg-blue-400">
                        <input id="toggle1" name="power" class="toggle__checkbox" type="checkbox" value="1" <?php checked(1, get_option('one_click_buy_btn_options')['power'], true); ?>>
                        <label for="toggle1" class="toggle__label toggle1__label"></label>
                    </div>
                </div>
                <!-- Button Text Input -->
                <div>
                    <label class="one_click_buy_btn-text-white dark:one_click_buy_btn-text-gray-200" for="button_text"
                        >Button Text</label
                        >
                    <input id="button_text" value="<?php echo esc_html(get_option('one_click_buy_btn_options')['button_text']); ?>"
                        name="button_text" type="text" class="one_click_buy_btn-block one_click_buy_btn-w-full one_click_buy_btn-px-4 one_click_buy_btn-py-2
                        one_click_buy_btn-mt-2 one_click_buy_btn-text-gray-700 one_click_buy_btn-bg-white one_click_buy_btn-border one_click_buy_btn-border-gray-300 one_click_buy_btn-rounded-md
                        dark:one_click_buy_btn-bg-gray-800 dark:one_click_buy_btn-text-gray-300 dark:one_click_buy_btn-border-gray-600
                        focus:one_click_buy_btn-border-blue-500 dark:focus:one_click_buy_btn-border-blue-500
                        focus:one_click_buy_btn-outline-none focus:one_click_buy_btn-ring" required>
                </div>
                <!-- Redirect Page Input -->
                <div>
                    <label class="one_click_buy_btn-text-white dark:one_click_buy_btn-text-gray-200" for="redirect_page"
                        >Redirect Page</label
                        >
                    <select
                        id="redirect_page"
                        onchange="toggleCustomPage()"
                        name="redirect_page"
                        value="<?php echo esc_html(get_option('one_click_buy_btn_options')['redirect_page']); ?>"
                        class="one_click_buy_btn-block one_click_buy_btn-w-full one_click_buy_btn-px-4 one_click_buy_btn-py-2 one_click_buy_btn-mt-2 one_click_buy_btn-text-gray-700 one_click_buy_btn-bg-white one_click_buy_btn-border one_click_buy_btn-border-gray-300 one_click_buy_btn-rounded-md dark:one_click_buy_btn-bg-gray-800 dark:one_click_buy_btn-text-gray-300 dark:one_click_buy_btn-border-gray-600 focus:one_click_buy_btn-border-blue-500 dark:focus:one_click_buy_btn-border-blue-500 focus:one_click_buy_btn-outline-none focus:one_click_buy_btn-ring"
                        >
                        <!-- Grab Page As Option From Wordpress Pages -->
                        <?php
                            if ($pages = get_pages()) {
                                foreach ($pages as $page) {
                                    echo '<option value="'.esc_attr(get_permalink($page->ID)).'" '.selected(esc_attr(get_permalink($page->ID)), get_option('one_click_buy_btn_options')['redirect_page']).'>'.esc_attr($page->post_title).'</option>';
                                }
                            }
                            ?>
                    </select>
                </div>
                <!-- Replace Add To Cart Button Input -->
                <div>
                    <label class="one_click_buy_btn-text-white one_click_buy_btn-mr-4 dark:one_click_buy_btn-text-gray-200" for="replace_add_to_cart"
                        >Replace Add To Cart Button ?</label>
                    <div class="toggle one_click_buy_btn-mt-2 one_click_buy_btn-bg-blue-400">
                        <input id="toggle2" name="replace_add_to_cart" class="toggle__checkbox" type="checkbox" value="1" <?php if (1 == get_option('one_click_buy_btn_options')['replace_add_to_cart']) {
                                echo esc_html('checked="checked"');
                            } ?> />
                        <label for="toggle2" class="toggle__label toggle2__label"></label>
                    </div>
                </div>
                <!-- Button Inline CSS Input -->
                <div>
                    <label
                        class="one_click_buy_btn-text-white dark:one_click_buy_btn-text-gray-200"
                        for="custom_css"
                        >Button Inline CSS</label
                        >
                    <textarea
                        id="textarea"
                        placeholder="text-align: center;
color: whte;"
                        name="custom_css"
                        rows="7"
                        type="textarea"
                        class="one_click_buy_btn-placeholder-gray-500 one_click_buy_btn-block one_click_buy_btn-w-full one_click_buy_btn-px-4 one_click_buy_btn-py-2 one_click_buy_btn-mt-2 one_click_buy_btn-text-gray-700 one_click_buy_btn-bg-white one_click_buy_btn-border one_click_buy_btn-border-gray-300 one_click_buy_btn-rounded-md dark:one_click_buy_btn-bg-gray-800 dark:one_click_buy_btn-text-gray-300 dark:one_click_buy_btn-border-gray-600 focus:one_click_buy_btn-border-blue-500 dark:focus:one_click_buy_btn-border-blue-500 focus:one_click_buy_btn-outline-none focus:one_click_buy_btn-ring"
                        ><?php echo esc_html(get_option('one_click_buy_btn_options')['custom_css']); ?></textarea>
                </div>
                                <!-- Button Text Input -->
                                <div>
                    <label class="one_click_buy_btn-text-white dark:one_click_buy_btn-text-gray-200" for="button_class"
                        >Button Class</label
                        >
                    <input id="button_class" value="<?php echo esc_html(get_option('one_click_buy_btn_options')['button_class']); ?>"
                        name="button_class" type="text" class="one_click_buy_btn-block one_click_buy_btn-w-full one_click_buy_btn-px-4 one_click_buy_btn-py-2
                        one_click_buy_btn-mt-2 one_click_buy_btn-text-gray-700 one_click_buy_btn-bg-white one_click_buy_btn-border one_click_buy_btn-border-gray-300 one_click_buy_btn-rounded-md
                        dark:one_click_buy_btn-bg-gray-800 dark:one_click_buy_btn-text-gray-300 dark:one_click_buy_btn-border-gray-600
                        focus:one_click_buy_btn-border-blue-500 dark:focus:one_click_buy_btn-border-blue-500
                        focus:one_click_buy_btn-outline-none focus:one_click_buy_btn-ring" required>
                </div>
            </div>
            <div class="one_click_buy_btn-flex one_click_buy_btn-justify-end one_click_buy_btn-mt-6">
                <!-- Wordpress Save Button -->
                <?php submit_button('Save Options'); ?>
            </div>
            <div class="one_click_buy_btn-text-white one_click_buy_btn-my-4">
                <p class="one_click_buy_btn-text-2xl one_click_buy_btn-mb-4">How to use?</p>
                <div class="one_click_buy_btn-flex one_click_buy_btn-flex-col one_click_buy_btn-gap-y-4">
                    <p class="one_click_buy_btn-text-lg">
                        Please read this
                        <a
                            href="https://shahriarahmed.me/plugins/one-click-buy-button#doc"
                            target="_blank"
                            class="one_click_buy_btn-text-lg one_click_buy_btn-text-blue-500 bold"
                            >documentation</a
                            >
                        to know how to use
                    </p>
                </div>
            </div>
        </form>
    </section>
</div>

