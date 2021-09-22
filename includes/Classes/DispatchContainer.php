<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage\Classes;

use DashboardMessage\Interfaces\DispatchInterfece;

class DispatchContainer
{
    protected $payload;

    /**
     * Inilize payload Object
     *
     * @since 1.0.0
     * @return void
     */
    public function __construct(DispatchInterfece $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Run Recevied Object dispatch method
     *
     * @since 1.0.0
     * @return void
     */
    public function run()
    {
        $this->payload->dispatch();
    }
}
