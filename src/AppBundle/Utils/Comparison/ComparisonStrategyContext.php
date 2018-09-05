<?php

namespace AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;
use AppBundle\Utils\Comparison\Exception\StrategyNotFoundException;

class ComparisonStrategyContext
{
    /** @var ComparatorInterface $strategy */
    protected $strategy;

    public function __construct($metricName)
    {
        switch ($metricName) {
            case 'stars':
            case 'forks':
            case 'watchers':
                $this->strategy = new MoreIsBetterComparator($metricName);
                break;
            case 'issues':
                $this->strategy = new LessIsBetterComparator($metricName);
                break;
            default:
                throw new StrategyNotFoundException(sprintf('There is no strategy for metric %s', $metricName));
        }
    }

    public function compare($valueA, $valueB): Metric
    {
        return $this->strategy->compare($valueA, $valueB);
    }
}
