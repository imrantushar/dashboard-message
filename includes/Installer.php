<?php
namespace DashboardMessage;

class Installer
{
    public static function init()
    {
        $self = new self();
        $self->set_option();
    }

    /**
     * Store Necessary data in the options table
     *
     * @since 1.0.0
     * @return void
     */
    public function set_option()
    {
        if (!get_option('dashboard_message_version')) {
            add_option('dashboard_message_version', DASHBOARDMESSAGE_VERSION);
        }
        if (!get_option('dashboard_message_first_install_time')) {
            add_option('dashboard_message_first_install_time', Helper::get_time(), '', false);
        }
    }
}
