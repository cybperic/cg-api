<?php
namespace DataProviders\Google;

use DataProviders\DataProvider;

class GoogleDataProvider extends DataProvider
{
    public function getStatistics($siteId)
    {
        //retrieve statistics from google for given site id. Probably we have a mapping local ID <-> external google ID
        return 155;
    }
}