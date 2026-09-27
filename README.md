# Rector for Shopwell

This project extends Rector with multiple rules for Shopwell.

See available [Shopwell rules](/docs/rector_rules_overview.md)


## Install

Make sure to install both `shopwell/shopwell-rector` as well as `rector/rector`.

```bash
composer req shopwell/shopwell-rector --dev
```

## Use Sets

To add a set to your config, use `Frosh\Rector\Set\ShopwareSetList` class and pick one of constants:

```php
use Rector\Config\RectorConfig;
use Frosh\Rector\Set\ShopwareSetList;

return RectorConfig::configure()
    ->withSets([
        ShopwareSetList::SHOPWARE_6_7_0,
    ]);
```

## Use directly the config

```bash
# Clone this repo

composer install

# Dry Run
./vendor/bin/rector process --config config/shopware-6.7.0.php --autoload-file [SHOPWARE]/vendor/autoload.php [SHOPWARE]/custom/plugins/MyPlugin --dry-run

# Normal Run
./vendor/bin/rector process --config config/shopware-6.7.0.php --autoload-file [SHOPWARE]/vendor/autoload.php [SHOPWARE]/custom/plugins/MyPlugin
```
