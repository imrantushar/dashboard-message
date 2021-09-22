<?php  declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage\Admin;

use DashboardMessage\Interfaces\DispatchInterfece;

class Controller implements DispatchInterfece
{

    /**
     * Added All Hook here
     *
     * @since 1.0.0
     * @return void
     */
    public function dispatch()
    {
        add_action('admin_post_dashboard_message_save_message', [$this, 'dashboardMessageSaveMessage']);
    }
    /**
     * Dashboard Message Form submit Callback Handler
     *
     * Fired by `admin_post_dashboard_message_save_message` action.
     *
     * @since 1.0.0
     * @return void
     */

    public function dashboardMessageSaveMessage() : bool
    {
        if (isset($_REQUEST['_dm_nonce']) &&
            wp_verify_nonce(
                sanitize_text_field(wp_unslash($_REQUEST['_dm_nonce'])),
                'dm-save-settings-nonce'
            ) &&
            current_user_can('manage_options')
        ) { // WPCS: input var ok; CSRF ok.
            do_action('dashboard_message_before_save_form_data', $_POST); // WPCS: input var ok; CSRF ok.
        
            $message = (isset($_POST['message']) ? sanitize_text_field(wp_unslash($_POST['message'])) : ""); // WPCS: input var ok; CSRF ok.
            $isUpdate = update_option(
                'dashboard_message',
                apply_filters('dashboard_message_form_message', $message),
                false
            );
            
            do_action('dashboard_message_after_save_form_data', $isUpdate);
            
            $refererUrl = add_query_arg([
                'status' => ($isUpdate ? 'success' : false),
            ], wp_get_referer());
            return wp_redirect(apply_filters('dashboard_message_form_redirect_url', $refererUrl));
        }
        die('Security check');
    }
}
