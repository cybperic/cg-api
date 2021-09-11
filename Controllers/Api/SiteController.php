<?php
namespace Controllers\Api;

use Models\Site;
use Middlewares\Authorization;

class SiteController
{
    //add xml format

    public function getStatistics($siteId)
    {

        if (!Authorization::isApiCallAuthorized())
        {
            return null;
        }


        header("Content-Type: application/json");
        $response = array(
            'error' => false,
            'message' => '',
            'siteId' => (int)$siteId,
            'data' => array()
        );

        if ($siteId > 100)
        {
            $response['error'] = true;
            $response['message'] = 'The provided ID does not match our records.';
            echo json_encode($response);
            return true;
        }

        $site = new Site($siteId);
        $response['data'] = $site->getAggregatedStatistics();
        echo json_encode($response);
        return true;
    }


}