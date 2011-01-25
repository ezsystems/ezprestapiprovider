<?php
/**
 * File containing the ezpRestApiProvider class.
 *
 * @copyright Copyright (C) 1999-2010 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU GPLv2
 */

class ezpRestApiProvider implements ezpRestProviderInterface
{
    /**
     * Returns registered versioned routes for provider
     *
     * @return array Associative array. Key is the route name (beware of name collision !). Value is the versioned route.
     */
    public function getRoutes()
    {
        $routes = array(
            'ezpListAtom'        => new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/content/node/:nodeId/listAtom', 'ezpRestAtomController', 'collection' ), 1 ),
            // @TODO : Make possible to interchange optional params positions
            'ezpList'            => new ezpRestVersionedRoute( new ezpMvcRegexpRoute( '@^/content/node/(?P<nodeId>\d+)/list(?:/offset/(?P<offset>\d+))?(?:/limit/(?P<limit>\d+))?(?:/sort/(?P<sortKey>\w+)(?:/(?P<sortType>asc|desc))?)?$@', 'ezpRestContentController', 'list' ), 1 ),
            'ezpNode'            => new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/content/node/:nodeId', 'ezpRestContentController', 'viewContent' ), 1 ),
            'ezpFieldsByNode'    => new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/content/node/:nodeId/fields', 'ezpRestContentController', 'viewFields' ), 1 ),
            'ezpFieldByNode'     => new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/content/node/:nodeId/field/:fieldIdentifier', 'ezpRestContentController', 'viewField' ), 1 ),
            'ezpChildrenCount'   => new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/content/node/:nodeId/childrenCount', 'ezpRestContentController', 'countChildren' ), 1 ),
            'ezpObject'          => new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/content/object/:objectId', 'ezpRestContentController', 'viewContent' ), 1 ),
            'ezpFieldsByObject'  => new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/content/object/:objectId/fields', 'ezpRestContentController', 'viewFields' ), 1 ),
            'ezpFieldByObject'   => new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/content/object/:objectId/field/:fieldIdentifier', 'ezpRestContentController', 'viewField' ), 1 )
        );
        return $routes;
    }

    /**
     * Returns associated with provider view controller
     *
     * @return ezpRestViewController
     */
    public function getViewController()
    {
        return new ezpRestApiViewController();
    }
}
