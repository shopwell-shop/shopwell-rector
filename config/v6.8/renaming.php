<?php

declare(strict_types=1);

use Shopwell\Rector\Rule\Class_\InterfaceReplacedWithAbstractClass;
use Shopwell\Rector\Rule\Class_\InterfaceReplacedWithAbstractClassRector;
use Shopwell\Rector\Rule\v68\CartBehaviorIsRecalculationRector;
use Shopwell\Rector\Rule\v68\EntitySearchResultGetEntitiesRector;
use Shopwell\Rector\Rule\v68\ProductStreamBuilderBuildFiltersToEnrichCriteriaRector;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->rule(CartBehaviorIsRecalculationRector::class);
    $rectorConfig->rule(EntitySearchResultGetEntitiesRector::class);
    $rectorConfig->rule(ProductStreamBuilderBuildFiltersToEnrichCriteriaRector::class);

    $rectorConfig->ruleWithConfiguration(
        InterfaceReplacedWithAbstractClassRector::class,
        [
            new InterfaceReplacedWithAbstractClass(
                'Shopwell\Core\Content\ProductStream\Service\ProductStreamBuilderInterface',
                '\Shopwell\Core\Content\ProductStream\Service\AbstractProductStreamBuilder',
            ),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'Shopwell\Core\Framework\Adapter\Console\ShopwellStyle' => 'Symfony\Component\Console\Style\SymfonyStyle',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassConstFetchRector::class,
        [
            new RenameClassAndConstFetch('Shopwell\Core\Checkout\Cart\AbstractCartPersister', 'PERSIST_CART_ERROR_PERMISSION', 'Shopwell\Core\Checkout\CheckoutPermissions', 'PERSIST_CART_ERROR'),

            new RenameClassAndConstFetch('Shopwell\Core\Checkout\Cart\Delivery\DeliveryProcessor', 'SKIP_DELIVERY_PRICE_RECALCULATION', 'Shopwell\Core\Checkout\CheckoutPermissions', 'SKIP_PRODUCT_STOCK_VALIDATION'),
            new RenameClassAndConstFetch('Shopwell\Core\Checkout\Cart\Delivery\DeliveryProcessor', 'SKIP_DELIVERY_TAX_RECALCULATION', 'Shopwell\Core\Checkout\CheckoutPermissions', 'SKIP_DELIVERY_TAX_RECALCULATION'),

            new RenameClassAndConstFetch('Shopwell\Core\Checkout\Promotion\Cart\PromotionCollector', 'SKIP_PROMOTION', 'Shopwell\Core\Checkout\CheckoutPermissions', 'SKIP_PROMOTION'),
            new RenameClassAndConstFetch('Shopwell\Core\Checkout\Promotion\Cart\PromotionCollector', 'SKIP_AUTOMATIC_PROMOTIONS', 'Shopwell\Core\Checkout\CheckoutPermissions', 'SKIP_AUTOMATIC_PROMOTIONS'),
            new RenameClassAndConstFetch('Shopwell\Core\Checkout\Promotion\Cart\PromotionCollector', 'PIN_MANUAL_PROMOTIONS', 'Shopwell\Core\Checkout\CheckoutPermissions', 'PIN_MANUAL_PROMOTIONS'),
            new RenameClassAndConstFetch('Shopwell\Core\Checkout\Promotion\Cart\PromotionCollector', 'PIN_AUTOMATIC_PROMOTIONS', 'Shopwell\Core\Checkout\CheckoutPermissions', 'PIN_AUTOMATIC_PROMOTIONS'),

            new RenameClassAndConstFetch('Shopwell\Core\Content\Product\Cart\ProductCartProcessor', 'ALLOW_PRODUCT_PRICE_OVERWRITES', 'Shopwell\Core\Checkout\CheckoutPermissions', 'ALLOW_PRODUCT_PRICE_OVERWRITES'),
            new RenameClassAndConstFetch('Shopwell\Core\Content\Product\Cart\ProductCartProcessor', 'ALLOW_PRODUCT_LABEL_OVERWRITES', 'Shopwell\Core\Checkout\CheckoutPermissions', 'ALLOW_PRODUCT_LABEL_OVERWRITES'),
            new RenameClassAndConstFetch('Shopwell\Core\Content\Product\Cart\ProductCartProcessor', 'SKIP_PRODUCT_RECALCULATION', 'Shopwell\Core\Checkout\CheckoutPermissions', 'SKIP_PRODUCT_RECALCULATION'),
            new RenameClassAndConstFetch('Shopwell\Core\Content\Product\Cart\ProductCartProcessor', 'SKIP_PRODUCT_STOCK_VALIDATION', 'Shopwell\Core\Checkout\CheckoutPermissions', 'SKIP_PRODUCT_STOCK_VALIDATION'),
            new RenameClassAndConstFetch('Shopwell\Core\Content\Product\Cart\ProductCartProcessor', 'KEEP_INACTIVE_PRODUCT', 'Shopwell\Core\Checkout\CheckoutPermissions', 'KEEP_INACTIVE_PRODUCT'),
        ],
    );
};
