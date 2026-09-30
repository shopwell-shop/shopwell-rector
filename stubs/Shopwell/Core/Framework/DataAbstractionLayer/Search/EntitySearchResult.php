<?php declare(strict_types=1);

namespace Shopwell\Core\Framework\DataAbstractionLayer\Search;

use Shopwell\Core\Framework\DataAbstractionLayer\EntityCollection;

class EntitySearchResult
{
    public function getEntities(): EntityCollection
    {
        return new EntityCollection();
    }
}
