<?php

namespace AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;
use AppBundle\Utils\Comparison\Exception\InvalidComparisonArgumentException;

class LessIsBetterComparator implements ComparatorInterface
{
    protected $metricName;

    public function __construct(string $metricName)
    {
        $this->metricName = $metricName;
    }

    public function compare($valueA, $valueB): Metric
    {
        if (!is_numeric($valueA) || !is_numeric($valueB)) {
            throw new InvalidComparisonArgumentException('Both values should be numeric!');
        }

        $metric = new Metric();
        $metric->setMetricName($this->metricName);
        $metric->setValueA($valueA);
        $metric->setValueB($valueB);
        $metric->setWinner($valueA <=> $valueB);

        return $metric;
    }
}
