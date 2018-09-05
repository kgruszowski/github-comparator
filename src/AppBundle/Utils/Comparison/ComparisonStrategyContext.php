<?php

namespace AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;

class ComparisonStrategyContext
{
    /** @var ComparatorInterface $strategy */
    protected $strategy;

    public function __construct($metricName)
    {
        switch ($metricName) {
            case 'stars':
                $this->strategy = new StarComparator();
                break;
            default:
        }
    }

    public function compare($valueA, $valueB): Metric
    {
        return $this->strategy->compare($valueA, $valueB);
    }
}
