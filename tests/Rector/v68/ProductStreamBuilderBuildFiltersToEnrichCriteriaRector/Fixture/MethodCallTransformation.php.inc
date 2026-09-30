<?php

namespace Shopwell\Core\Content\ProductStream\Service;

interface ProductStreamBuilderInterface
{
    /** @return array<int, mixed> */
    public function buildFilters(string $id, \Shopwell\Core\Framework\Context $context): array;
}

namespace MyPlugin;

use Shopwell\Core\Content\ProductStream\Service\ProductStreamBuilderInterface;
use Shopwell\Core\Framework\Context;
use Shopwell\Core\Framework\DataAbstractionLayer\Search\Criteria;

class MyService
{
    public function __construct(
        private readonly ProductStreamBuilderInterface $productStreamBuilder,
    ) {
    }

    public function doSomething(string $streamId, Context $context, Criteria $criteria): void
    {
        $filters = $this->productStreamBuilder->buildFilters($streamId, $context);
        $criteria->addFilter(...$filters);
    }
}
-----
<?php

namespace Shopwell\Core\Content\ProductStream\Service;

interface ProductStreamBuilderInterface
{
    /** @return array<int, mixed> */
    public function buildFilters(string $id, \Shopwell\Core\Framework\Context $context): array;
}

namespace MyPlugin;

use Shopwell\Core\Content\ProductStream\Service\ProductStreamBuilderInterface;
use Shopwell\Core\Framework\Context;
use Shopwell\Core\Framework\DataAbstractionLayer\Search\Criteria;

class MyService
{
    public function __construct(
        private readonly ProductStreamBuilderInterface $productStreamBuilder,
    ) {
    }

    public function doSomething(string $streamId, Context $context, Criteria $criteria): void
    {
        $this->productStreamBuilder->enrichCriteria($criteria, $streamId, $context);
    }
}
