<div class="dashboard-message-settings-wrap">
    <h1><?php esc_html_e('Dashboard Message', 'dashboard-message'); ?></h1>
    <?php
        if ($is_update) :
    ?>
    <div class="notice notice-success settings-error is-dismissible"> 
        <p>
            <strong><?php esc_html_e('Message Saved.', 'dashboard-message') ?></strong>
        </p>
        <a href="<?php echo esc_url(admin_url('tools.php?page=dashboard-message')); ?>" type="button" class="notice-dismiss"><span class="screen-reader-text"></span></a>
    </div>
    <?php endif; ?>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
        <?php wp_nonce_field('dm-save-settings-nonce', '_dm_nonce'); ?>
        <input type="hidden" name="action" value="dashboard_message_save_message" />
        <p>
            <textarea name="message" id="dashboardmessage" cols="50" rows="10"><?php echo esc_textarea($message); ?></textarea>
        </p>
        <?php
            do_action('dashboard_message_before_form_submit');
        ?>
        <button type="submit" class="button button-primary"><?php esc_html_e('Save Message', 'dashboard-message'); ?></button>
    </form>
</div>