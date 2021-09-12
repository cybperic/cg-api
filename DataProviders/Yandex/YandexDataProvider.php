<?php
namespace Cg\DataProviders\Yandex;

use Cg\DataProviders\DataProvider;
use Curl\Curl;

class YandexDataProvider extends DataProvider
{
    public function getStatistics($siteId)
    {
        //retrieve statistics from yandex for given site id.
        return 145;
    }

    public function getPageViews($siteId)
    {
        //retrieve page views from yandex for given site id.
        return 145;
    }

    public function getLocations($siteId)
    {
        //retrieve locations from yandex for given site id.
        return array('Boston' => 123, 'London' => 234);
    }
}