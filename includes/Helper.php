<?php
namespace DashboardMessage;

class Helper
{
    /**
     * get current timestamp
     *
     * @since 1.0.0
     * @return timestamp
     */
    public static function get_time()
    {
        return time() + (get_option('gmt_offset') * HOUR_IN_SECONDS);
    }
}
