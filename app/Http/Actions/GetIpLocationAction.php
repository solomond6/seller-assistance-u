<?php

namespace App\Http\Actions;

use App\Http\Actions\BaseAction;
use Torann\GeoIP\Location;

class GetIpLocationAction extends BaseAction
{
    /**
     * @param string|null $ipAddress
     *
     * @return Ip|null
     */
    public function execute(?string $ipAddress) : ?Location
    {
        if (empty($ipAddress)) {
            return null;
        }

        try {
            return geoip($ipAddress);
        } catch (\Exception $exception) {
            return null;
        }
    }
}
