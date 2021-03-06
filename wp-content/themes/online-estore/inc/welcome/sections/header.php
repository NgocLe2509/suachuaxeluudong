<div class="welcome-header clearfix">
    <div class="welcome-intro">
        <h2><?php
            printf(// WPCS: XSS OK.
                    /* translators: 1-theme name, 2-theme version */
                    esc_html__('Welcome to %1$s - Version %2$s', 'online-estore'), $this->theme_name, $this->theme_version);
            ?>
        </h2>
        <div class="welcome-text">
            <?php
            printf(// WPCS: XSS OK.
                    /* translators: 1-theme name */
                    esc_html__('Welcome and thank you for installing %1$s. Online eStore is a clean, beautiful and fully customizable responsive modern free Multipurpose WordPress theme. And of course, the premium version for additional features and better supports.', 'online-estore'), $this->theme_name);
            ?>
        </div>

        <div class="free-pro-demos">
            <a class="button button-primary" href="https://demo.sparklewpthemes.com/online-estore/" target="_blank"><span class="dashicons dashicons-visibility"></span><?php esc_html_e('Free Demos', 'online-estore'); ?></a>
            <a class="button button-primary" href="https://demo.sparklewpthemes.com/online-estore-pro/" target="_blank"><span class="dashicons dashicons-cart"></span><?php esc_html_e('Premium Demos', 'online-estore'); ?></a>
            <a class="button button-primary" href="https://docs.sparklewpthemes.com/" target="_blank"><span class="dashicons Media dashicons-media-document"></span><?php esc_html_e('Documentaion', 'online-estore'); ?></a>
        </div>
    </div>

    <div class="welcome-promo-banner">
        <a class="welcome-promo-offer" href="<?php echo esc_url('https://sparklewpthemes.com/wordpress-themes/online-estore-pro/'); ?>" target="_blank"><?php echo esc_html__('Unlock all the possibilities with Online eStore Pro', 'online-estore'); ?></a>
        <a href="<?php echo esc_url('https://sparklewpthemes.com/wordpress-themes/online-estore-pro/'); ?>" target="_blank" class="button button-primary upgrade-btn"><?php echo esc_html__('Upgrade for $59', 'online-estore'); ?></a>
    </div>
</div>

<div class="welcome-nav-wrapper clearfix">
    <?php foreach ($tabs as $section_id => $label) : ?>
        <?php
        $section = isset($_GET['section']) && array_key_exists($_GET['section'], $tabs) ? $_GET['section'] : 'getting_started';
        $nav_class = 'welcome-nav-tab';
        if ($section_id == $section) {
            $nav_class .= ' welcome-nav-tab-active';
        }
        ?>
        <a href="<?php echo esc_url(admin_url('admin.php?page=onlineestore-welcome&section=' . $section_id)); ?>" class="<?php echo esc_attr($nav_class); ?>" >
            <?php echo esc_html($label); ?>
        </a>
    <?php endforeach; ?>
</div>