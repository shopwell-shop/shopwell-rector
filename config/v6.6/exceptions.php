<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Transform\Rector\New_\NewToStaticCallRector;
use Rector\Transform\ValueObject\NewToStaticCall;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        NewToStaticCallRector::class,
        [
            // RoutingException
            new NewToStaticCall('Shopwell\Core\Framework\Routing\Exception\InvalidRequestParameterException', 'Shopwell\Core\Framework\Routing\RoutingException', 'invalidRequestParameter'),
            new NewToStaticCall('Shopwell\Core\Framework\Routing\Exception\MissingRequestParameterException', 'Shopwell\Core\Framework\Routing\RoutingException', 'missingRequestParameter'),
            new NewToStaticCall('Shopwell\Core\Framework\Routing\Exception\LanguageNotFoundException', 'Shopwell\Core\Framework\Routing\RoutingException', 'languageNotFound'),

            // DataAbstractionLayerException
            new NewToStaticCall('Shopwell\Core\Framework\DataAbstractionLayer\Exception\InvalidSerializerFieldException', 'Shopwell\Core\Framework\DataAbstractionLayer\DataAbstractionLayerException', 'invalidSerializerField'),
            new NewToStaticCall('Shopwell\Core\Framework\DataAbstractionLayer\Exception\VersionMergeAlreadyLockedException', 'Shopwell\Core\Framework\DataAbstractionLayer\DataAbstractionLayerException', 'versionMergeAlreadyLocked'),

            // ElasticsearchException
            new NewToStaticCall('Shopwell\Elasticsearch\Exception\UnsupportedElasticsearchDefinitionException', 'Shopwell\Elasticsearch\ElasticsearchException', 'unsupportedElasticsearchDefinition'),
            new NewToStaticCall('Shopwell\Elasticsearch\Exception\ElasticsearchIndexingException', 'Shopwell\Elasticsearch\ElasticsearchException', 'indexingError'),
            new NewToStaticCall('Shopwell\Elasticsearch\Exception\ServerNotAvailableException', 'Shopwell\Elasticsearch\ElasticsearchException', 'serverNotAvailable'),

            // ProductExportException
            new NewToStaticCall('Shopwell\Core\Content\ProductExport\Exception\EmptyExportException', 'Shopwell\Core\Content\ProductExport\ProductExportException', 'productExportNotFound'),
            new NewToStaticCall('Shopwell\Core\Content\ProductExport\Exception\RenderFooterException', 'Shopwell\Core\Content\ProductExport\ProductExportException', 'renderFooterException'),
            new NewToStaticCall('Shopwell\Core\Content\ProductExport\Exception\RenderHeaderException', 'Shopwell\Core\Content\ProductExport\ProductExportException', 'renderHeaderException'),
            new NewToStaticCall('Shopwell\Core\Content\ProductExport\Exception\RenderProductException', 'Shopwell\Core\Content\ProductExport\ProductExportException', 'renderProductException'),
        ],
    );
};
