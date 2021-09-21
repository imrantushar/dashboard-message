<?php  declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage\Admin;

class Menu
{
    public static function init()
    {
        $self = new self();
        add_action('admin_menu', [$self, 'addMenu']);
        add_action('network_admin_menu', [$self, 'addNetworkMenu']);
    }
    
    /**
     * Add All necessary admin menu
     *
     * Fired by `admin_menu` action.
     *
     * @since 1.0.0
     * @return void
     */
    public function addMenu()
    {
        add_submenu_page(
            'tools.php',
            __('Dashboard Message', 'dashboard-message'),
            __('Dashboard Message', 'dashboard-message'),
            'manage_options',
            DASHBOARDMESSAGE_PLUGIN_SLUG,
            [$this, 'dashboardMessageRefPageCallback']
        );
    }

    /**
     * Add All necessary admin menu
     *
     * Fired by `network_admin_menu` action.
     *
     * @since 1.0.0
     * @return void
     */
    public function addNetworkMenu()
    {
        add_menu_page(
            __('Dashboard Message', 'dashboard-message'),
            __('Dashboard Message', 'dashboard-message'),
            'manage_options',
            DASHBOARDMESSAGE_PLUGIN_SLUG,
            [$this, 'dashboardMessageRefPageCallback']
        );
    }

    /**
     * Admin Dashboard Message Page view
     *
     * @since 1.0.0
     * @return void
     */
    public function dashboardMessageRefPageCallback()
    {
        $isUpdate = (isset($_GET['status']) && $_GET['status'] === 'success' ? true : false);  // WPCS: input var ok; CSRF ok.
        $message = get_option('dashboard_message');
        include DASHBOARDMESSAGE_ADMIN_VIEW_PATH . 'dashboard-message-form.php';
    }
}
