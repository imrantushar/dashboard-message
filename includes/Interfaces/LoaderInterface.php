<?php   declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage\Interfaces;

interface LoaderInterface {
    public function add(Object $value);
    public function run();
}