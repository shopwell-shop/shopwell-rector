<?php
namespace Shopwell\Rector\Tests\Rector\v65\MigrateRouteScopeToRouteDefaults\Fixture;

use Shopwell\Core\Framework\Routing\Annotation\RouteScope;

/**
 * @RouteScope(scopes={"storefront", "api"})
 */
class Controller
{
}
?>

-----
<?php
namespace Shopwell\Rector\Tests\Rector\v65\MigrateRouteScopeToRouteDefaults\Fixture;

use Shopwell\Core\Framework\Routing\Annotation\RouteScope;

/**
 * @Route(defaults={"_routeScope"={"storefront", "api"}})
 */
class Controller
{
}
?>

