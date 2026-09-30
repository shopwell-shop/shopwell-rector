<?php

declare(strict_types=1);

use Frosh\Rector\Set\ShopwellSetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->importNames();

    $rectorConfig->sets([
        ShopwellSetList::SHOPWELL_6_5_0,
        ShopwellSetList::SHOPWELL_6_6_0,
        ShopwellSetList::SHOPWELL_6_6_4,
        ShopwellSetList::SHOPWELL_6_6_10,
        ShopwellSetList::SHOPWELL_6_7_0,
        ShopwellSetList::SHOPWELL_6_8_0,
    ]);
};
