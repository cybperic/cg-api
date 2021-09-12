<?php
namespace Cg\DataProviders\Google;

use Cg\DataProviders\DataProvider;
use Curl\Curl;

class GoogleDataProvider extends DataProvider
{
    public function getStatistics($siteId)
    {
        //retrieve statistics from google for given site id.
        return 155;
    }

    public function getPageViews($siteId)
    {
        //retrieve statistics from google for given site id.
        return 155;
    }

    public function getLocations($siteId)
    {
        //retrieve locations from google for given site id.
        return array('Boston' => 156, 'London' => 270);
    }
}