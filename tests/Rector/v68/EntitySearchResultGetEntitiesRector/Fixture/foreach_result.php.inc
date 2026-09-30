<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;

function foreachResult(EntitySearchResult $result): void
{
    foreach ($result as $entity) {
        var_dump($entity);
    }
}

?>
-----
<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;

function foreachResult(EntitySearchResult $result): void
{
    foreach ($result->getEntities() as $entity) {
        var_dump($entity);
    }
}

?>
