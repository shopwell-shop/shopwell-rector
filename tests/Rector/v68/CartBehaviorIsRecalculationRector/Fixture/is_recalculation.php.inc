<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Checkout\Cart\CartBehavior;

function checkRecalculation(CartBehavior $behavior): bool
{
    return $behavior->isRecalculation();
}

function checkNullableRecalculation(?CartBehavior $behavior): ?bool
{
    return $behavior?->isRecalculation();
}

?>
-----
<?php

namespace Shopwell\Tests\Rector\Fixture;

use Shopwell\Core\Checkout\CheckoutPermissions;
use Shopwell\Core\Checkout\Cart\CartBehavior;

function checkRecalculation(CartBehavior $behavior): bool
{
    return $behavior->hasPermission(CheckoutPermissions::SKIP_CART_PERSISTENCE);
}

function checkNullableRecalculation(?CartBehavior $behavior): ?bool
{
    return $behavior?->hasPermission(CheckoutPermissions::SKIP_CART_PERSISTENCE);
}

?>
