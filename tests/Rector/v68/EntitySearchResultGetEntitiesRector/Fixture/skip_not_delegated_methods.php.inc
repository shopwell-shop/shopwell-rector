<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Framework\DataAbstractionLayer\Entity;
use Shopwell\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;

function skipNotDelegatedMethods(EntitySearchResult $result, Entity $entity): int
{
    $result->add($entity);

    return $result->getTotal();
}

?>
