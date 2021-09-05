<?php
namespace DashboardMessage\Admin;

class Menu
{
    public static function init()
    {
        $self = new self();
        add_action('admin_menu', array( $self, 'add_menu' ));
    }
    
    /**
     * Add All necessary admin menu
     *
     * Fired by `admin_menu` action.
     *
     * @since 1.0.0
     * @return void
     */
    public function add_menu()
    {
        add_submenu_page(
            'tools.php',
            __('Dashboard Message', 'dashboard-message'),
            __('Dashboard Message', 'dashboard-message'),
            'manage_options',
            DASHBOARDMESSAGE_PLUGIN_SLUG,
            array($this, 'dashboard_message_ref_page_callback')
        );
    }

    /**
     * Admin Dashboard Message Page view
     *
     * @since 1.0.0
     * @return void
     */
    public function dashboard_message_ref_page_callback()
    {
        $is_update = (isset($_GET['status']) && $_GET['status'] == 'success' ? true : false);
        $message = get_option('dashboard_message');
        include DASHBOARDMESSAGE_ADMIN_VIEW_PATH . 'dashboard-message-form.php';
    }
}
