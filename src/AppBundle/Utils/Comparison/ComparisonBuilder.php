<?php

namespace AppBundle\Utils\Comparison;

use AppBundle\Entity\Comparison;
use AppBundle\Entity\Metric;
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

    public function buildComparison(): Comparison
    {
        $comparison = new Comparison();
        $comparison->setRepositoryA($this->repositoryA);
        $comparison->setRepositoryB($this->repositoryB);
        $comparison->setMetricCollection($this->metricCollection);

        /** @var Metric $metric */
        foreach ($this->metricCollection as $metric) {
            if ($metric->getWinner() == -1) {
                $comparison->incrementNumOfWinRepositoryA();
            } else if ($metric->getWinner() == 1) {
                $comparison->incrementNumOfWinRepositoryB();
            } else {
                $comparison->incrementNumOfDraw();
            }
        }

        $comparison->setWinner();

        return $comparison;
    }

}