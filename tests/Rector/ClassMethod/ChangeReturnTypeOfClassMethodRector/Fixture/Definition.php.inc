<?php declare(strict_types=1);

namespace Shopwell\Rector\Tests\Rector\ClassMethod\ChangeReturnTypeOfClassMethodRector\Fixture;

use OpenSearchDSL\Query\Compound\BoolQuery;
use Shopwell\Core\Framework\Context;
use Shopwell\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopwell\Elasticsearch\Framework\AbstractElasticsearchDefinition;

class ElasticsearchProductDefinition extends AbstractElasticsearchDefinition
{
    public function buildTermQuery(Context $context, Criteria $criteria): BoolQuery
    {
    }
}

-----
<?php declare(strict_types=1);

namespace Shopwell\Rector\Tests\Rector\ClassMethod\ChangeReturnTypeOfClassMethodRector\Fixture;

use OpenSearchDSL\BuilderInterface;
use OpenSearchDSL\Query\Compound\BoolQuery;
use Shopwell\Core\Framework\Context;
use Shopwell\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopwell\Elasticsearch\Framework\AbstractElasticsearchDefinition;

class ElasticsearchProductDefinition extends AbstractElasticsearchDefinition
{
    public function buildTermQuery(Context $context, Criteria $criteria): BuilderInterface
    {
    }
}
