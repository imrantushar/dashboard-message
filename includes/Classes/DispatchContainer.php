<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage\Classes;

use DashboardMessage\Interfaces\DispatchInterfece;

class DispatchContainer {
    protected $payload;

    public function __construct(DispatchInterfece $payload)
    {
        $this->payload = $payload;
    }

    public function run()
    {
        $this->payload->dispatch();
    }
}