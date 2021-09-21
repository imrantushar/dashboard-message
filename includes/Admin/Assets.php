<?php  declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage\Admin;

class Assets
{
    public static function init()
    {
        $self = new self();
        add_action('admin_enqueue_scripts', [$self, 'loadScripts']);
    }

    /**
    * Load scripts for Dashboard Message Settings page
    *
    * Fired by `admin_enqueue_scripts` action.
    *
    * @since 1.0.0
    * @return void
    */
    public function loadScripts(string $hook)
    {
        if ('tools_page_' . DASHBOARDMESSAGE_PLUGIN_SLUG === $hook ||
            'toplevel_page_' . DASHBOARDMESSAGE_PLUGIN_SLUG === $hook
        ) {
            wp_enqueue_style(
                'dashboard-message-styles',
                DASHBOARDMESSAGE_PLUGIN_ROOT_URI . 'assets/css/dashboard-message.css'
            );
        }
    }
}
