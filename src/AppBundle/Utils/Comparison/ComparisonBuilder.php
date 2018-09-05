<?php

namespace AppBundle\Utils\Comparison;

use AppBundle\Entity\Repository;

class ComparisonBuilder
{

    protected $repositoryA;
    protected $repositoryB;
    protected $metricCollection;

    public function addRepositories(Repository $repositoryA, Repository $repositoryB): ComparisonBuilder
    {
        $this->repositoryA = $repositoryA;
        $this->repositoryB = $repositoryB;

        return $this;
    }

    public function addMetric(string $metricName, $valueA, $valueB): ComparisonBuilder
    {
        $metric = (new ComparisonStrategyContext($metricName))->compare($valueA, $valueB);

        $this->metricCollection[$metricName] = $metric;

        return $this;
    }

    public function compare()
    {
        return $this->metricCollection;
    }

}