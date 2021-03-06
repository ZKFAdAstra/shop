<?php

use KMT\AAShop\KMTAAShop;

use Symfony\Component\ClassLoader\DebugUniversalClassLoader;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Debug\ErrorHandler;
use Symfony\Component\HttpKernel\Debug\ExceptionHandler;
use Sylius\Bundle\CoreBundle\Kernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
        		new KMTAAShop(),
        );

        return array_merge(parent::registerBundles(), $bundles);
    }
}
