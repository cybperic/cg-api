<?php
namespace Models;


class Site
{
    protected $id;

    protected $externalSources = array(
        'google' => 'DataProviders\Google\GoogleDataProvider',
        'yandex' => 'DataProviders\Yandex\YandexDataProvider'
    );

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    protected function getDbStatistics()
    {
        //retrieve from local database the statistics for given id, $this->id
        return 345;
    }

    public function getAggregatedStatistics()
    {
        $aggregatedStatistics = array();
        foreach ($this->externalSources as $sourceId => $externalSource)
        {
            $dataProvider = new $externalSource();
            $statistics = $dataProvider->getStatistics($this->id);
            $aggregatedStatistics[ucfirst($sourceId) . " Statistics"] = $statistics;
        }
        $dbStatistics = $this->getDbStatistics();
        $aggregatedStatistics["Db Statistics"] = $dbStatistics;

        return $aggregatedStatistics;
    }
}