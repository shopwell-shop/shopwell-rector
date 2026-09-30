<?php
namespace Shopwell\Rector\Tests\Rector\v65\ContextMetadataExtensionToStateRector\Fixture;

$context = new \Shopwell\Core\Framework\Context();
$context->addExtension(\Shopwell\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry::USE_INDEXING_QUEUE, new \Shopwell\Core\Framework\Struct\ArrayEntity());
?>
-----
<?php
namespace Shopwell\Rector\Tests\Rector\v65\ContextMetadataExtensionToStateRector\Fixture;

use Shopwell\Core\Framework\Context;
use Shopwell\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry;

$context = new Context();
$context->addState(EntityIndexerRegistry::USE_INDEXING_QUEUE);
?>
