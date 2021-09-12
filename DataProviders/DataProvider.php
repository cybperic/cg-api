<?php
namespace Cg\DataProviders;

abstract class DataProvider
{
    abstract  public function getStatistics($siteId);

    abstract  public function getPageViews($siteId);

    abstract  public function getLocations($siteId);
}