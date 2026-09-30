<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'Shopwell\Core\Framework\Adapter\Console\ShopwellStyle' => 'Symfony\Component\Console\Style\SymfonyStyle',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassConstFetchRector::class,
        [
            new RenameClassAndConstFetch('Shopwell\Core\Content\MailTemplate\Subscriber\MailSendSubscriberConfig', 'MAIL_CONFIG_EXTENSION', 'Shopwell\Core\Content\Flow\Dispatching\Action\SendMailAction', 'MAIL_CONFIG_EXTENSION'),
            new RenameClassAndConstFetch('Shopwell\Core\Content\MailTemplate\Subscriber\MailSendSubscriberConfig', 'ACTION_NAME', 'Shopwell\Core\Content\Flow\Dispatching\Action\SendMailAction', 'ACTION_NAME'),

            new RenameClassAndConstFetch('Shopwell\Core\Content\MailTemplate\MailTemplateActions', 'MAIL_TEMPLATE_MAIL_SEND_ACTION', 'Shopwell\Core\Content\Flow\Dispatching\Action\SendMailAction', 'ACTION_NAME'),

            new RenameClassAndConstFetch('Shopwell\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'STATE_LOGGED_IN', 'Shopwell\Core\Framework\Adapter\Cache\CacheStateSubscriber', 'STATE_LOGGED_IN'),
            new RenameClassAndConstFetch('Shopwell\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'STATE_CART_FILLED', 'Shopwell\Core\Framework\Adapter\Cache\CacheStateSubscriber', 'STATE_CART_FILLED'),

            new RenameClassAndConstFetch('Shopwell\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'CURRENCY_COOKIE', 'Shopwell\Core\Framework\Adapter\Cache\Http\HttpCacheKeyGenerator', 'CURRENCY_COOKIE'),
            new RenameClassAndConstFetch('Shopwell\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'CONTEXT_CACHE_COOKIE', 'Shopwell\Core\Framework\Adapter\Cache\Http\HttpCacheKeyGenerator', 'CONTEXT_CACHE_COOKIE'),
            new RenameClassAndConstFetch('Shopwell\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'SYSTEM_STATE_COOKIE', 'Shopwell\Core\Framework\Adapter\Cache\Http\HttpCacheKeyGenerator', 'SYSTEM_STATE_COOKIE'),
            new RenameClassAndConstFetch('Shopwell\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'INVALIDATION_STATES_HEADER', 'Shopwell\Core\Framework\Adapter\Cache\Http\HttpCacheKeyGenerator', 'INVALIDATION_STATES_HEADER'),
        ],
    );
};
