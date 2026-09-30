# Rector for Shopwell

This project extends Rector with multiple Rules for Shopwell specific. 

See available [Shopwell rules](/docs/rector_rules_overview.md)


## Install

Make sure to install both `shopwell/shopwell-rector` as well as `rector/rector`.

```bash
composer req shopwell/shopwell-rector --dev
```

## Use Sets

To add a set to your config, use `Shopwell\Rector\Set\ShopwellSetList` class and pick one of constants:

```php
use Rector\Config\RectorConfig;
use Shopwell\Rector\Set\ShopwellSetList;

return RectorConfig::configure()
    ->withSets([
        ShopwellSetList::SHOPWELL_6_7_0,
    ]);
```

## Use directly the config

```bash
# Clone this repo

composer install

# Dry Run
./vendor/bin/rector process --config config/shopwell-6.7.0.php --autoload-file [SHOPWELL]/vendor/autoload.php [SHOPWELL]/custom/plugins/MyPlugin --dry-run

# Normal Run
./vendor/bin/rector process --config config/shopwell-6.7.0.php --autoload-file [SHOPWELL]/vendor/autoload.php [SHOPWELL]/custom/plugins/MyPlugin
```
