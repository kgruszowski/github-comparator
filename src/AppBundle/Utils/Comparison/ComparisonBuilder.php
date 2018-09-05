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

    /**
     * @param Repository $repositoryA
     * @param Repository $repositoryB
     * @return ComparisonBuilder
     */
    public function addRepositories(Repository $repositoryA, Repository $repositoryB): ComparisonBuilder
    {
        $this->repositoryA = $repositoryA;
        $this->repositoryB = $repositoryB;

        return $this;
    }

    /**
     * @param string $metricName
     * @param $valueA
     * @param $valueB
     * @return ComparisonBuilder
     * @throws Exception\StrategyNotFoundException
     */
    public function addMetric(string $metricName, $valueA, $valueB): ComparisonBuilder
    {
        $metric = (new ComparisonStrategyContext($metricName))->compare($valueA, $valueB);

        $this->metricCollection[$metricName] = $metric;

        return $this;
    }

    /**
     * @return Comparison
     */
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
            } elseif ($metric->getWinner() == 1) {
                $comparison->incrementNumOfWinRepositoryB();
            } elseif ($metric->getWinner() == 0) {
                $comparison->incrementNumOfDraw();
            }
        }

        $comparison->setWinner();

        return $comparison;
    }
}