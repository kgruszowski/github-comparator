<?php

namespace AppBundle\Service;

use AppBundle\Entity\Repository;
use AppBundle\Utils\Comparison\ComparisonStrategyContext;

class ComparatorService
{

    public function compare(Repository $repositoryA, Repository $repositoryB)
    {
        $starMetric = (new ComparisonStrategyContext('stars'))->compare(
            $repositoryA->getNumOfStars(),
            $repositoryB->getNumOfStars()
        );

        return [$starMetric];
    }

}