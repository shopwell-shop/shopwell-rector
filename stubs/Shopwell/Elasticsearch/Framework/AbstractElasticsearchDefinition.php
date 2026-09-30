<?php declare(strict_types=1);

namespace Shopwell\Elasticsearch\Framework;

use OpenSearchDSL\Query\Compound\BoolQuery;
use Shopwell\Core\Framework\Context;
use Shopwell\Core\Framework\DataAbstractionLayer\Search\Criteria;

abstract class AbstractElasticsearchDefinition
{
    abstract public function buildTermQuery(Context $context, Criteria $criteria): BoolQuery;
}
