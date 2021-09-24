<?php declare(strict_types=1); # -*- coding: utf-8 -*-

namespace DashboardMessage\Tests\Unit;

use DashboardMessage\Admin;
use DashboardMessage\Admin\Menu;
use DashboardMessage\Admin\Assets;

class AdminTest extends AbstractUnitTestcase
{
    public function testBasic()
    {
        $admin = new Admin();
        $admin->add(new Assets());
        $admin->add(new Menu());
        $admin->dispatch();
        $this->assertTrue(
            method_exists($admin, 'dispatch'),
            'Class does not have method dispatch'
        );
    }
}
