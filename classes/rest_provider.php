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
     * @return array
     */
    public function getRoutes()
    {
        return array( new ezpRestVersionedRoute( new ezcMvcRailsRoute( '/content/node/:nodeId/listAtom', 'ezpRestAtomController', 'collection' ), 1 ),
                      new ezpRestVersionedRoute( new ezcMvcRailsRoute( '/content/node/:nodeId/list', 'ezpRestContentController', 'list' ), 1 ),
                      new ezpRestVersionedRoute( new ezcMvcRailsRoute( '/content/node/:nodeId', 'ezpRestContentController', 'viewContent' ), 1 ),
                      new ezpRestVersionedRoute( new ezcMvcRailsRoute( '/content/node/:nodeId/fields', 'ezpRestContentController', 'viewFields' ), 1 ),
                      new ezpRestVersionedRoute( new ezcMvcRailsRoute( '/content/node/:nodeId/field/:fieldIdentifier', 'ezpRestContentController', 'viewField' ), 1 ),
                      new ezpRestVersionedRoute( new ezcMvcRailsRoute( '/content/object/:objectId', 'ezpRestContentController', 'viewContent' ), 1 ),
                      new ezpRestVersionedRoute( new ezcMvcRailsRoute( '/content/object/:objectId/fields', 'ezpRestContentController', 'viewFields' ), 1 ),
                      new ezpRestVersionedRoute( new ezcMvcRailsRoute( '/content/object/:objectId/field/:fieldIdentifier', 'ezpRestContentController', 'viewField' ), 1 ) );
    }

    /**
     * Returns associated with provider view controller
     *
     * @return ezpRestViewController
     */
    public function getViewController() {
        // TODO: Implement getViewController() method.
    }
}
