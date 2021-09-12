<?php
namespace Cg\Controllers\Api;

use Cg\Models\Site;
use Cg\Http\Middlewares\Authorization;

class SiteController
{
    //add xml format

    public function getStatistics($siteId)
    {
        if (!Authorization::isApiCallAuthorized()) return null;

        $site = new Site($siteId);
        $results = $site->getAggregatedData('statistics');
        return $this->returnResults($siteId, $results);
    }

    public function getPageViews($siteId)
    {
        if (!Authorization::isApiCallAuthorized()) return null;

        $site = new Site($siteId);
        $results = $site->getAggregatedData('pageViews');
        return $this->returnResults($siteId, $results);
    }

    public function getLocations($siteId)
    {
        if (!Authorization::isApiCallAuthorized()) return null;

        $site = new Site($siteId);
        $results = $site->getAggregatedData('locations');
        return $this->returnResults($siteId, $results);
    }

    protected function returnResults($siteId, $results)
    {
        header("Content-Type: application/json");
        $response = array(
            'error' => false,
            'message' => '',
            'siteId' => (int)$siteId,
            'data' => array()
        );
        if ($results)
        {
            $response['data'] = $results;
        }
        else
        {
            $response['error'] = true;
            $response['Message'] = 'Api data unavailable.';
        }

        echo json_encode($response);
        return true;
    }

}