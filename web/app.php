<?php
ini_set('memory_limit', '128M');
//ini_set('memory_limit', '256M');
//init_set('display_errors', 1); error_reporting(E_ALL);

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';

//$loader = new ApcClassLoader('sylius', $loader);
//$loader->register(true);

require_once __DIR__.'/../app/AppKernel.php';
//require_once __DIR__.'/../app/AppCache.php';

$kernel = new AppKernel('prod', false);
//$kernel = new AppCache($kernel);

$request = Request::createFromGlobals();

Request::enableHttpMethodParameterOverride();

$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
