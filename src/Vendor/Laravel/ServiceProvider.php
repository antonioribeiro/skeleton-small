<?php 
 
/**
 * Part of the Skeleton package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Skeleton
 * @version    1.0.0
 * @author     Antonio Carlos Ribeiro @ PragmaRX
 * @license    BSD License (3-clause)
 * @copyright  (c) 2013, PragmaRX
 * @link       http://pragmarx.com
 */

namespace PragmaRX\Skeleton\Vendor\Laravel;
 
use PragmaRX\Skeleton\Skeleton;

use PragmaRX\Support\ServiceProvider as PragmaRXServiceProvider;

class ServiceProvider extends PragmaRXServiceProvider {

    protected $packageVendor = 'pragmarx';
    protected $packageVendorCapitalized = 'PragmaRX';

    protected $packageName = 'skeleton';
    protected $packageNameCapitalized = 'Skeleton';

    protected $packageNamespace = 'pragmarx/skeleton';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {   
        $this->preRegister();

        $this->registerSkeleton();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('skeleton');
    }

    /**
     * Takes all the components of Skeleton and glues them
     * together to create Skeleton.
     *
     * @return void
     */
    private function registerSkeleton()
    {
        $this->app['skeleton'] = $this->app->share(function($app)
        {
            $app['skeleton.loaded'] = true;

            return new Skeleton($app['skeleton.config']);
        });
    }

    public function getRootDirectory()
    {
        return __DIR__.'/../..';
    }

}
