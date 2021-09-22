<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage\Interfaces;

interface DispatchInterfece
{

    /**
     * Initilize All Hooks
     *
     * @since 1.0.0
     * @return void
     */
    public function dispatch();
}
