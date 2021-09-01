<?php
namespace DashboardMessage;

class Migration
{
    public static function init()
    {
        $self = new self();
        $self->run_migration();
    }
    /**
     * Version Number keep update when the plugin comes to a new update
     *
     * @since 1.0.0
     * @return void
     */
    public function run_migration()
    {
        $current_version = get_option('dashboard_message_version');
        if ($current_version && $current_version != DASHBOARDMESSAGE_VERSION) {
            // plugin update logic will be here
            update_option('dashboard_message_version', DASHBOARDMESSAGE_VERSION);
        }
    }
}
