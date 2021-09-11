<?php
namespace DataProviders;

abstract class DataProvider
{
    abstract  public function getStatistics($siteId);

}