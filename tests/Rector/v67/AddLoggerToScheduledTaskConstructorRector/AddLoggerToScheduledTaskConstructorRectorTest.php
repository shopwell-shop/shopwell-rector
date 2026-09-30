<?php declare(strict_types=1);

namespace Shopwell\Rector\Tests\Rector\v67\AddLoggerToScheduledTaskConstructorRector;

use PHPUnit\Framework\Attributes\CoversClass;
use Shopwell\Rector\Rule\v67\AddLoggerToScheduledTaskConstructorRector;
use Shopwell\Rector\Tests\Rector\AbstractShopwellRectorTestCase;

/**
 * @internal
 */
#[CoversClass(AddLoggerToScheduledTaskConstructorRector::class)]
final class AddLoggerToScheduledTaskConstructorRectorTest extends AbstractShopwellRectorTestCase {}
