<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;

function countFunctions(EntitySearchResult $result): array
{
    $count = count($result);

    return [$count, iterator_to_array($result)];
}

?>
-----
<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;

function countFunctions(EntitySearchResult $result): array
{
    $count = count($result->getEntities());

    return [$count, iterator_to_array($result->getEntities())];
}

?>
