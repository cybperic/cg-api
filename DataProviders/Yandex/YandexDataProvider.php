<?php
namespace DataProviders\Yandex;

use DataProviders\DataProvider;

class YandexDataProvider extends DataProvider
{
    public function getStatistics($siteId)
    {
        //retrieve statistics from yandex for given site id. Probably we have a mapping local ID <-> external yandex ID
        return 145;
    }
}