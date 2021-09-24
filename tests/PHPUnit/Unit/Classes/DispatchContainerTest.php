<?php declare(strict_types=1); # -*- coding: utf-8 -*-

namespace DashboardMessage\Tests\Unit;

use DashboardMessage\Admin\Assets;
use DashboardMessage\Classes\DispatchContainer;

class DispatchContainerTest extends AbstractUnitTestcase
{
    public function testBasic()
    {
        $dispatch = new DispatchContainer(new Assets());
        $this->assertTrue(
            method_exists($dispatch, 'run'),
            'Class does not have method run'
        );
    }
}
