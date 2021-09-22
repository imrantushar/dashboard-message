<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage\Interfaces;

interface LoaderInterface
{
    /**
     * insert object
     *
     * @since 1.0.0
     * @return void
     */
    public function add(Object $value);

    /**
     * Run All Hooks
     *
     * @since 1.0.0
     * @return void
     */
    public function dispatch();
}
