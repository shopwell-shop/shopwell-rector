<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;
use Rector\Renaming\ValueObject\RenameStaticMethod;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename('Shopwell\Elasticsearch\Framework\Indexing\IndexerOffset', 'setNextDefinition', 'selectNextDefinition'),
            new MethodCallRename('Shopwell\Elasticsearch\Framework\Indexing\IndexerOffset', 'setNextLanguage', 'selectNextLanguage'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameStaticMethodRector::class,
        [
            new RenameStaticMethod('Shopwell\Core\Framework\DataAbstractionLayer\FieldSerializer\JsonFieldSerializer', 'encodeJson', 'Shopwell\Core\Framework\Util\Json', 'encode'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'Shopwell\Core\Framework\DataAbstractionLayer\Event\BeforeDeleteEvent' => 'Shopwell\Core\Framework\DataAbstractionLayer\Event\EntityDeleteEvent',
            'Shopwell\Core\Framework\Api\Exception\ExceptionFailedException' => 'Shopwell\Core\Framework\Api\Exception\ExpectationFailedException',
            'Shopwell\Core\Framework\Adapter\Console\ShopwellStyle' => 'Symfony\Component\Console\Style\SymfonyStyle',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassConstFetchRector::class,
        [
            new RenameClassAndConstFetch('Shopwell\Core\Checkout\Cart', 'CHECKOUT_ORDER_PLACED', 'Shopwell\Core\Framework\Event\BusinessEvents', 'CHECKOUT_ORDER_PLACED'),
            new RenameClassAndConstFetch('Shopwell\Elasticsearch\Product\ElasticsearchProductDefinition', 'KEYWORD_FIELD', 'Shopwell\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'KEYWORD_FIELD'),
            new RenameClassAndConstFetch('Shopwell\Elasticsearch\Product\ElasticsearchProductDefinition', 'BOOLEAN_FIELD', 'Shopwell\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'BOOLEAN_FIELD'),
            new RenameClassAndConstFetch('Shopwell\Elasticsearch\Product\ElasticsearchProductDefinition', 'FLOAT_FIELD', 'Shopwell\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'FLOAT_FIELD'),
            new RenameClassAndConstFetch('Shopwell\Elasticsearch\Product\ElasticsearchProductDefinition', 'INT_FIELD', 'Shopwell\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'INT_FIELD'),
            new RenameClassAndConstFetch('Shopwell\Elasticsearch\Product\ElasticsearchProductDefinition', 'SEARCH_FIELD', 'Shopwell\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'SEARCH_FIELD'),
        ],
    );
};
