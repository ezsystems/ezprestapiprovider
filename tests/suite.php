<?php
/**
 * File containing ezpRestContentServicesTestSuite class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU GPLv2
 */

/**
 * Main test suite for REST content services
 */
class ezpRestContentServicesTestSuite extends ezpDatabaseTestSuite
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "eZ Publish REST content services test suite" );
        $this->addTestSuite( 'ezpRestContentServiceModelTest' );
    }

    public static function suite()
    {
        return new self();
    }

    public function setUp()
    {
        parent::setUp();

        // make sure extension is enabled and settings are read
        ezpExtensionHelper::load( 'ezprestapiprovider' );
        ezpExtensionHelper::load( 'rest' );
    }

    public function tearDown()
    {
        ezpExtensionHelper::unload( 'ezprestapiprovider' );
        ezpExtensionHelper::unload( 'rest' );
        parent::tearDown();
    }
}

?>
