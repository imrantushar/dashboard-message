<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage;

use DashboardMessage\Classes\DispatchContainer;
use DashboardMessage\Interfaces\LoaderInterface;

class Admin implements LoaderInterface
{
    protected $payload = [];

    public function add(Object $state)
    {
        $this->payload[] = $state;
    }

    public function run()
    {
        foreach($this->payload as $payloadItem){
            $Obj = new $payloadItem;
            $Obj = new DispatchContainer($Obj);
            $Obj->run();
        }
    }
}
