<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage;

use DashboardMessage\Admin\Menu;
use DashboardMessage\Admin\Assets;
use DashboardMessage\Admin\Widgets;
use DashboardMessage\Admin\Controller;

class Bootstrap
{
    public function __construct()
    {
        if (is_admin()) {
            $this->adminInit();
        }
    }

    /**
     * Run All Admin Hooks
     *
     * @since 1.0.0
     * @return void
     */
    public function adminInit()
    {
        $admin = new Admin();
        $admin->add(new Controller());
        $admin->add(new Assets());
        $admin->add(new Menu());
        $admin->add(new Widgets());
        $admin->dispatch();
    }
}
