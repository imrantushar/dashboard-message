<?php
namespace DashboardMessage;

class Admin
{
    public static function init()
    {
        $self = new self();
        Admin\Menu::init();
        Admin\Widgets::init();
        $self->dispatch_hook();
    }
    public function dispatch_hook()
    {
        add_action('admin_post_dashboard_message_save_message', array($this, 'dashboard_message_save_message'));
    }
    /**
     * Dashboard Message Form submit Callback Handler
     *
     * Fired by `admin_post_dashboard_message_save_message` action.
     *
     * @since 1.0.0
     * @return void
     */
    public function dashboard_message_save_message()
    {
        if (isset($_REQUEST['_dm_nonce']) && wp_verify_nonce($_REQUEST['_dm_nonce'], 'dm-save-settings-nonce') && current_user_can('manage_options')) {
            do_action('dashboard_message_before_save_form_data', $_POST);
        
            $message = (isset($_POST['message']) ? sanitize_text_field($_POST['message']) : "");
            $is_update = update_option('dashboard_message', apply_filters('dashboard_message_form_message', $message), false);
            
            do_action('dashboard_message_after_save_form_data', $is_update);
            
            $referer_url = add_query_arg(array(
                'status' => ($is_update ? 'success' : false),
            ), wp_get_referer());
            wp_redirect(apply_filters('dashboard_message_form_redirect_url', $referer_url));
        } else {
            die(__('Security check', 'academy'));
        }
    }
}
