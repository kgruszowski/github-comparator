<?php

namespace AppBundle\Utils\Transformer\User;

use AppBundle\Entity\User;

interface UserTransformerInterface
{
    public function transform($data): User;
}