<?php

namespace AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;

class NoWinnerComparator implements ComparatorInterface
{
    protected $metricName;

    public function __construct(string $metricName)
    {
        $this->metricName = $metricName;
    }

    public function compare($valueA, $valueB): Metric
    {
        $metric = new Metric();
        $metric->setMetricName($this->metricName);
        $metric->setValueA($valueA);
        $metric->setValueB($valueB);
        $metric->setWinner(0);

        return $metric;
    }


}