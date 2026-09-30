<?php

declare(strict_types=1);

use Shopwell\Rector\Rule\Class_\InterfaceReplacedWithAbstractClass;
use Shopwell\Rector\Rule\Class_\InterfaceReplacedWithAbstractClassRector;
use Shopwell\Rector\Rule\ClassConstructor\RemoveArgumentFromClassConstruct;
use Shopwell\Rector\Rule\ClassConstructor\RemoveArgumentFromClassConstructRector;
use Shopwell\Rector\Rule\Transform\Rector\Assign\PropertyFetchToMethodCallRector;
use Shopwell\Rector\Rule\Transform\ValueObject\PropertyFetchToMethodCall;
use Shopwell\Rector\Rule\v65\FakerPropertyToMethodCallRector;
use Shopwell\Rector\Rule\v65\MigrateCaptchaAnnotationToRouteRector;
use Shopwell\Rector\Rule\v65\MigrateLoginRequiredAnnotationToRouteRector;
use Shopwell\Rector\Rule\v65\MigrateRouteScopeToRouteDefaults;
use Shopwell\Rector\Rule\v65\ThumbnailGenerateSingleToMultiGenerateRector;
use Rector\Arguments\Rector\MethodCall\RemoveMethodCallParamRector;
use Rector\Arguments\ValueObject\RemoveMethodCallParam;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename('Shopwell\Core\Framework\Adapter\Twig\EntityTemplateLoader', 'clearInternalCache', 'reset'),
            new MethodCallRename('Shopwell\Core\Content\ImportExport\Processing\Mapping\Mapping', 'getDefault', 'getDefaultValue'),
            new MethodCallRename('Shopwell\Core\Content\ImportExport\Processing\Mapping\Mapping', 'getMappedDefault', 'getDefaultValue'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'Shopwell\Core\Framework\Adapter\Asset\ThemeAssetPackage' => 'Shopwell\Storefront\Theme\ThemeAssetPackage',
            'Maltyxx\ImagesGenerator\ImagesGeneratorProvider' => 'bheller\ImagesGenerator\ImagesGeneratorProvider',
            'Shopwell\Core\Framework\Event\BusinessEventInterface' => 'Shopwell\Core\Framework\Event\FlowEventAware',
            'Shopwell\Core\Framework\Event\MailActionInterface' => 'Shopwell\Core\Framework\Event\MailAware',
            'Shopwell\Core\Framework\Log\LogAwareBusinessEventInterface' => 'Shopwell\Core\Framework\Log\LogAware',
            'Shopwell\Storefront\Event\ProductExportContentTypeEvent' => 'Shopwell\Core\Content\ProductExport\Event\ProductExportContentTypeEvent',
            'Shopwell\Storefront\Page\Product\Review\MatrixElement' => 'Shopwell\Core\Content\Product\SalesChannel\Review\MatrixElement',
            'Shopwell\Storefront\Page\Product\Review\RatingMatrix' => 'Shopwell\Core\Content\Product\SalesChannel\Review\RatingMatrix',
            'Shopwell\Storefront\Page\Address\Listing\AddressListingCriteriaEvent' => 'Shopwell\Core\Checkout\Customer\Event\AddressListingCriteriaEvent',
            'Shopwell\Administration\Service\AdminOrderCartService' => 'Shopwell\Core\Checkout\Cart\ApiOrderCartService',
            'Shopwell\Core\System\User\Service\UserProvisioner' => 'Shopwell\Core\Maintenance\User\Service\UserProvisioner',
            'Shopwell\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface' => 'Shopwell\Core\Framework\DataAbstractionLayer\EntityRepository',
            'Shopwell\Core\System\SalesChannel\Entity\SalesChannelRepositoryInterface' => 'Shopwell\Core\System\SalesChannel\Entity\SalesChannelRepository',
            'Shopwell\Core\Framework\Adapter\Console\ShopwellStyle' => 'Symfony\Component\Console\Style\SymfonyStyle',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RemoveMethodCallParamRector::class,
        [
            new RemoveMethodCallParam('Shopwell\Core\Checkout\Cart\Tax\Struct\CalculatedTaxCollection', 'merge', 1),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RemoveArgumentFromClassConstructRector::class,
        [
            new RemoveArgumentFromClassConstruct('Shopwell\Core\Checkout\Customer\Exception\DuplicateWishlistProductException', 0),
            new RemoveArgumentFromClassConstruct('Shopwell\Core\Content\Newsletter\Exception\LanguageOfNewsletterDeleteException', 0),
        ],
    );

    $rectorConfig->rule(MigrateLoginRequiredAnnotationToRouteRector::class);
    $rectorConfig->rule(MigrateCaptchaAnnotationToRouteRector::class);
    $rectorConfig->rule(MigrateRouteScopeToRouteDefaults::class);
    $rectorConfig->rule(ThumbnailGenerateSingleToMultiGenerateRector::class);

    $rectorConfig->ruleWithConfiguration(
        PropertyFetchToMethodCallRector::class,
        [new PropertyFetchToMethodCall(
            'Shopwell\Core\Content\Flow\Dispatching\FlowState',
            'sequenceId',
            'getSequenceId',
            null,
        )],
    );

    $rectorConfig->ruleWithConfiguration(
        InterfaceReplacedWithAbstractClassRector::class,
        [
            new InterfaceReplacedWithAbstractClass('Shopwell\Core\Checkout\Cart\CartPersisterInterface', 'Shopwell\Core\Checkout\Cart\AbstractCartPersister'),
            new InterfaceReplacedWithAbstractClass('Shopwell\Core\Content\Sitemap\Provider\UrlProviderInterface', 'Shopwell\Core\Content\Sitemap\Provider\AbstractUrlProvider'),
            new InterfaceReplacedWithAbstractClass('Shopwell\Core\System\Snippet\Files\SnippetFileInterface', 'Shopwell\Core\System\Snippet\Files\GenericSnippetFile'),
        ],
    );

    $rectorConfig->rule(FakerPropertyToMethodCallRector::class);
};
