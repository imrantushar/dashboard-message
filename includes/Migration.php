<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage;

class Migration
{
    public static function init()
    {
        $self = new self();
        $self->runMigration();
    }
    /**
     * Version Number keep update when the plugin comes to a new update
     *
     * @since 1.0.0
     * @return void
     */
    public function runMigration()
    {
        $currentVersion = get_option('dashboard_message_version');
        if ($currentVersion && $currentVersion !== DASHBOARDMESSAGE_VERSION) {
            // plugin update logic will be here
            update_option('dashboard_message_version', DASHBOARDMESSAGE_VERSION);
        }
    }
}
