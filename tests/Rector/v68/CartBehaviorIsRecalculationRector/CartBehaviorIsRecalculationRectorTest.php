<?php

declare(strict_types=1);

namespace Shopwell\Rector\Tests\Rector\v68\CartBehaviorIsRecalculationRector;

use PHPUnit\Framework\Attributes\CoversClass;
use Shopwell\Rector\Rule\v68\CartBehaviorIsRecalculationRector;
use Shopwell\Rector\Tests\Rector\AbstractShopwellRectorTestCase;

/**
 * @internal
 */
#[CoversClass(CartBehaviorIsRecalculationRector::class)]
final class CartBehaviorIsRecalculationRectorTest extends AbstractShopwellRectorTestCase {}
