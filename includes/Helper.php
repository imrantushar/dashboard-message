<?php    declare(strict_types=1); // -*- coding: utf-8 -*-
namespace DashboardMessage;

class Helper
{
    /**
     * get current timestamp
     *
     * @since 1.0.0
     * @return timestamp
     */
    public static function currenttime() : int
    {
        return time() + (get_option('gmt_offset') * HOUR_IN_SECONDS);
    }
}
