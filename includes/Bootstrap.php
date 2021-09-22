<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage;

use DashboardMessage\Admin\Menu;
use DashboardMessage\Admin\Assets;
use DashboardMessage\Admin\Widgets;
use DashboardMessage\Admin\Controller;

class Bootstrap {
    public function __construct()
    {
        if(is_admin()){
            $this->admin_init();
        }
    }

    public function admin_init()
    {
        $Admin = new Admin();
        $Admin->add(new Controller());
        $Admin->add(new Assets());
        $Admin->add(new Menu());
        $Admin->add(new Widgets());
        $Admin->run();
    }
}