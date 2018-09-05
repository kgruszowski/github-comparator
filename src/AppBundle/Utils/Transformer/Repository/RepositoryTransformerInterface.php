<?php

namespace AppBundle\Utils\Transformer\Repository;

use AppBundle\Entity\Repository;

interface RepositoryTransformerInterface
{
    public function transform($data): Repository;
}