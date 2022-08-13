<?php
global $WCFM, $wp_query;

?>

<div class="collapse wcfm-collapse" id="wcfm_build_listing">

    <div class="wcfm-page-headig">
        <span class="fa fa-cubes"></span>
        <span class="wcfm-page-heading-text"><?php _e('Meetings', 'wcfm-custom-menus'); ?></span>
        <?php do_action('wcfm_page_heading'); ?>
    </div>
    <div class="wcfm-collapse-content">
        <div id="wcfm_page_load"></div>
        <?php do_action('before_wcfm_build'); ?>

        <?php include __DIR__ . '/common/tab.php';?>
        <div class="wcfm-clearfix"></div><br />


        <div class="wcfm-container">
            <div id="wcfm_build_listing_expander" class="wcfm-content">

                <!---- Add Content Here ----->
                <?php //var_dump($action); 
                ?>

                <div class="tutor-zoom-content tutor-mt-24 tutor-zoom-frontend tutor-pb-40">
                    <div class="zoom-configure-wrapper tutor-d-xl-flex tutor-align-center tutor-mt-36">
                        <div class="tutor-zoom-icon-content-wrapper tutor-d-flex tutor-sm-32 tutor-p-16">
                            <i class="tutor-icon-brand-zoom tutor-mt-4" area-hidden="true"></i>
                            <div class="zoom-content">
                                <div class="tutor-fs-4 tutor-fw-medium tutor-color-black tutor-mb-12">
                                    Please set your Zoom Setting  </div>

                                <div class="tutor-fs-7 tutor-color-secondary">
                                    Please set your API Credentials. Without valid credentials, Zoom integration will not work. Create credentials by following <a class="tutor-btn tutor-btn-link tutor-btn-sm" target="_blank" href="https://marketplace.zoom.us/develop/create" rel="noreferrer noopener">this link</a>. </div>
                            </div>
                        </div>
                        <div class="zoom-image tutor-mt-xl-0 tutor-mt-16">
                            <img class="tutor-m-auto" src="http://zoom-plugin-develop.local/wp-content/plugins/tutor-pro/addons/tutor-zoom//assets/images/zoom-api-key-banner.svg" alt="zoom-config">
                        </div>
                    </div>
                </div>

                <form action="" id="knoiledge-set-api-form">
                    <div class="form-group">
                        <p class="meeting_title wcfm_title"><strong>API Key</strong></p>
                        <label class="screen-reader-text" for="meeting_name">API Key</label>
                        <input type="text" id="meeting_name" name="tutor_zoom_api[api_key]" class="wcfm-text" value="<?php echo esc_attr($this->zoom->get_api('api_key')); ?>" placeholder="">
                    </div>

                    <div class="form-group">
                        <p class="meeting_title wcfm_title"><strong>Secret Key</strong></p>
                        <label class="screen-reader-text" for="meeting_summary">Secret Key</label>
                        <input type="text" id="meeting_summary" name="tutor_zoom_api[api_secret]" class="wcfm-text" value="<?php echo esc_attr($this->zoom->get_api('api_secret')); ?>" placeholder="">
                    </div>
                    <?php wp_nonce_field('knoiledge_set_api_nonce', 'knoiledge_set_api_name'); ?>
                    <div class="form-group">
                        <input type="hidden" name="action" value="knoiledge_set_api_ac">
                        <input type="submit" name="save" class="wcfm-text tutor-btn tutor-btn-primary" value="Save &amp; Check Connection">
                    </div>

                    <div class="form-group">
                        <p id="message"></p>
                    </div>

                </form>

                <div class="wcfm-clearfix"></div>
            </div>
            <div class="wcfm-clearfix"></div>
        </div>

        <div class="wcfm-clearfix"></div>
        <?php
        do_action('after_wcfm_build');
        ?>
    </div>
</div>