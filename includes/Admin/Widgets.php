<?php declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage\Admin;

class Widgets
{
    public static function init()
    {
        $self = new self();
        add_action('wp_dashboard_setup', [$self, 'addDashboardWidget']);
        add_action('wp_network_dashboard_setup', [$self, 'addDashboardWidget']);
    }
    /**
     * Register New Dashboard Widget
     *
     * @since 1.0.0
     * @return void
     */
    public function addDashboardWidget()
    {
        wp_add_dashboard_widget(
            'dashboard_message',
            __('Dashboard Message', 'dashboard-message'),
            [$this, 'dashboardMessageWidgetCallback'],
            null,
            null,
            'normal',
            'high'
        );
    }

    /**
     * Widget Dashboard Message Callabck
     *
     * @since 1.0.0
     * @return void
     */
    public function dashboardMessageWidgetCallback()
    {
        $message = get_option('dashboard_message');
        include DASHBOARDMESSAGE_ADMIN_VIEW_PATH . 'dashboard-message.php';
    }
}
