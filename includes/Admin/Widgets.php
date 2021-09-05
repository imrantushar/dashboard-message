<?php
namespace DashboardMessage\Admin;

class Widgets
{
    public static function init()
    {
        $self = new self();
        add_action('wp_dashboard_setup', [$self, 'add_dashboard_widget']);
        add_action('wp_network_dashboard_setup', [$self, 'add_dashboard_widget']);
    }
    /**
     * Register New Dashboard Widget
     *
     * @since 1.0.0
     * @return void
     */
    public function add_dashboard_widget()
    {
        wp_add_dashboard_widget('dashboard_message', __('Dashboard Message'), [$this, 'dashboard_message_widget_callback'], null, null, 'normal', 'high');
    }

    /**
     * Widget Dashboard Message Callabck
     *
     * @since 1.0.0
     * @return void
     */
    public function dashboard_message_widget_callback()
    {
        $message = get_option('dashboard_message');
        include DASHBOARDMESSAGE_ADMIN_VIEW_PATH . 'dashboard-message.php';
    }
}
