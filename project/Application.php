<?php

namespace Project;

use Slim\Slim;

/**
 * Class Application
 * @package Project
 */
final class Application extends Slim
{
    /**
     * @param $args
     * @return \Slim\Route
     */
    protected function mapRoute($args)
    {
        $callable = array_pop($args);
        if (is_string($callable) && (false !== strpos($callable, '#'))) {
            list($controller, $action) = explode('#', $callable);
            $container = $this->container;
            $callable = function () use ($container, $controller, $action) {
                if ($container->has($controller)) {
                    $controller = $container->get($container);
                } else {
                    $class = new \ReflectionClass(__NAMESPACE__ . "\\Controllers\\{$controller}Controller");
                    $controller = $class->newInstance($container);
                }
                return call_user_func_array([$controller, $action . 'Action'], func_get_args());
            };
        }
        $args[] = $callable;
        return parent::mapRoute($args);
    }
}
