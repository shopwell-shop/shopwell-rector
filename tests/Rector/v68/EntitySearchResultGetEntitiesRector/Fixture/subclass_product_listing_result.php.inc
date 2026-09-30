<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Content\Product\SalesChannel\Listing\ProductListingResult;

function subclassResult(ProductListingResult $result): ?object
{
    return $result->first();
}

?>
-----
<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Content\Product\SalesChannel\Listing\ProductListingResult;

function subclassResult(ProductListingResult $result): ?object
{
    return $result->getEntities()->first();
}

?>
