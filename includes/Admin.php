<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage;

use DashboardMessage\Classes\DispatchContainer;
use DashboardMessage\Interfaces\LoaderInterface;

class Admin implements LoaderInterface
{
    protected $payload = [];

    /**
     * Store Obj
     *
     * @since 1.0.0
     * @return void
     */
    public function add(Object $state)
    {
        $this->payload[] = $state;
    }

    /**
     * Run Hooks
     *
     * @since 1.0.0
     * @return void
     */
    public function dispatch()
    {
        foreach ($this->payload as $payloadItem) {
            $obj = new $payloadItem;
            $obj = new DispatchContainer($obj);
            $obj->run();
        }
    }
}
