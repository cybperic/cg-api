<?php
namespace Cg\Models;


class Site
{
    protected $id;

    protected $externalSources = array(
        'google' => 'Cg\DataProviders\Google\GoogleDataProvider',
        'yandex' => 'Cg\DataProviders\Yandex\YandexDataProvider'
    );

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getAggregatedData($dataType)
    {
        $methodName = 'get' . $dataType;
        $localMethodName = 'getDb' . $dataType;

        //simulating non existing site id
        if ($this->id > 100)
        {
            return null;
        }
        $aggregatedData = array();
        foreach ($this->externalSources as $sourceId => $externalSource)
        {
            $dataProvider = new $externalSource();
            $statistics = $dataProvider->{$methodName}($this->id);
            $aggregatedData[ucfirst($sourceId) . " " . ucfirst($dataType)] = $statistics;
        }
        $dbStatistics = $this->{$localMethodName}();
        $aggregatedData["Db " . ucfirst($dataType)] = $dbStatistics;

        return $aggregatedData;

    }

    protected function getDbStatistics()
    {
        //retrieve from local database the statistics for given id, $this->id
        return 345;
    }

    protected function getDbPageViews()
    {
        //retrieve from local database the page views for given id, $this->id
        return 345;
    }

    protected function getDbLocations()
    {
        //retrieve from local database the locations for given id, $this->id
        return array('Boston' => 143, 'London' => 266);
    }
}