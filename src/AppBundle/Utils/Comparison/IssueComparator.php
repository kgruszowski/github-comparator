<?php

namespace AppBundle\Utils\Comparison;

use AppBundle\Entity\Metric;
use AppBundle\Utils\Comparison\Exception\InvalidComparisonArgumentException;

class IssueComparator implements ComparatorInterface
{
    public function compare($valueA, $valueB): Metric
    {
        if (!is_numeric($valueA) || !is_numeric($valueB)) {
            throw new InvalidComparisonArgumentException('Both values should be numeric!');
        }

        $metric = new Metric();
        $metric->setMetricName('issues');
        $metric->setValueA($valueA);
        $metric->setValueB($valueB);
        $metric->setWinner($valueA <=> $valueB);

        return $metric;
    }
}
