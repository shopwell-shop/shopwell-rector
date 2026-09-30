<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;

function simpleFirst(EntitySearchResult $result): ?object
{
    return $result->first();
}

?>
-----
<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;

function simpleFirst(EntitySearchResult $result): ?object
{
    return $result->getEntities()->first();
}

?>
