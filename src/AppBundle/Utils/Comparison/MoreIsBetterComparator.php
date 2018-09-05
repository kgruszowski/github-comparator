<?php

namespace AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;
use AppBundle\Utils\Comparison\Exception\InvalidComparisonArgumentException;
use function PHPSTORM_META\type;

class MoreIsBetterComparator implements ComparatorInterface
{
    protected $metricName;

    public function __construct(string $metricName)
    {
        $this->metricName = $metricName;
    }

    public function compare($valueA, $valueB): Metric
    {
        if (gettype($valueA) != gettype($valueB)) {
            throw new InvalidComparisonArgumentException('Both values should be the same type!');
        }

        $metric = new Metric();
        $metric->setMetricName($this->metricName);
        $metric->setValueA($valueA);
        $metric->setValueB($valueB);
        $metric->setWinner($valueB <=> $valueA);

        return $metric;
    }
}
