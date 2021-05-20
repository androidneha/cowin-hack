<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Project\Application([
    'cookies.encrypt' => true,
    'cookies.secret_key' => 'cowin.alternate',
    'debug' => defined('DEBUG_ENABLED'),
    'templates.path' => __DIR__ . '/../project/views',
]);

$app->container->set('app', $app);

$app->container->singleton('view', function () use ($app) {
	$view = new Slim\Views\Smarty();
	$view->parserCacheDirectory = __DIR__ . '/../storage/smarty/cache';
	$view->parserCompileDirectory = __DIR__ . '/../storage/smarty/compiled';
	$view->parserExtensions = [
		__DIR__ . '/../vendor/slim/views/SmartyPlugins',
		__DIR__ . '/../project/views/extensions',
	];
	$view->setTemplatesDirectory($app->config('templates.path'));
    $view->getInstance()->setEscapeHtml(true);
	return $view;
});

$app->add(new Slim\Middleware\SessionCookie(['name' => '__cowin_alternate']));

$app->group('/', function () use ($app) {
    $app->get('/', 'Index#index')->name('index');
    $app->post('search-by-pin', 'Index#index')->name('search_by_pincode');
});

// </editor-fold>

$app->run();
