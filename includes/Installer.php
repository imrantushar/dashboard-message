<?php    declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage;

class Installer
{
    public static function init()
    {
        $self = new self();
        $self->saveOptionData();
    }

    /**
     * Store Necessary data in the options table
     *
     * @since 1.0.0
     * @return void
     */
    public function saveOptionData()
    {
        if (!get_option('dashboard_message_version')) {
            add_option('dashboard_message_version', DASHBOARDMESSAGE_VERSION);
        }
        if (!get_option('dashboard_message_first_install_time')) {
            add_option('dashboard_message_first_install_time', Helper::currenttime(), '', false);
        }
    }
}
