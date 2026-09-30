<?php

namespace Shopwell\Core\Checkout\Cart;

interface CartPersisterInterface {}
abstract class AbstractCartPersister {}

class MyClass implements CartPersisterInterface
{
    private CartPersisterInterface $cartPersister;

    public function __construct(CartPersisterInterface $cartPersister)
    {
        $this->cartPersister = $cartPersister;
    }
}
-----
<?php

namespace Shopwell\Core\Checkout\Cart;

interface CartPersisterInterface {}
abstract class AbstractCartPersister {}

class MyClass extends \Shopwell\Core\Checkout\Cart\AbstractCartPersister
{
    private \Shopwell\Core\Checkout\Cart\AbstractCartPersister $cartPersister;
    public function __construct(\Shopwell\Core\Checkout\Cart\AbstractCartPersister $cartPersister)
    {
        $this->cartPersister = $cartPersister;
    }
}
