<?php
namespace DashboardMessage\Admin;

class Widgets
{
    public static function init()
    {
        $self = new self();
        add_action('wp_dashboard_setup', [$self, 'add_dashboard_widget']);
    }
    /**
     * Register New Dashboard Widget
     *
     * @since 1.0.0
     * @return void
     */
    public function add_dashboard_widget()
    {
        wp_add_dashboard_widget('dashboard_message', __('Dashboard Message'), [$this, 'dashboard_message_widget_callback']);
    }

    /**
     * Widget Dashboard Message Callabck
     *
     * @since 1.0.0
     * @return void
     */
    public function dashboard_message_widget_callback()
    {
        echo 'Dashboard Message';
    }
}
