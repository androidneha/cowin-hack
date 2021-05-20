<?php

namespace Project\Controllers;

use GuzzleHttp\Client;
use Maknz\Slack\Attachment;
use Slim\Helper\Set;

/**
 * Class ControllerAbstract
 * @package Project\Controllers
 * @property \Slim\Slim $app
 * @property \Slim\View $view
 */
abstract class ControllerAbstract
{
    /**
     * @var Set
     */
    protected $container;

    /**
     * ControllerAbstract constructor.
     * @param Set $container
     */
    final public function __construct(Set $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $name
     * @return mixed
     */
    final public function __get($name)
    {
        return $this->container->get($name);
    }

    public function commentUpdate($msg)
    {
        return '['.date('Y/m/d H:i:s').'] '.$msg;
    }

    protected function offerDemoDiscount()
    {

    }

    /**
     * @param string $type
     * @param array $errors
     * @param bool $now
     */
    protected function flashErrors($type, array $errors, $now = true)
    {
        foreach ($errors as $field => $multiple) {
            foreach ($multiple as $single) {
                $this->app->{$now ? 'flashNow' : 'flash'}($single, $type);
            }
        }
    }

    protected function respondWithJson(array $data)
    {
        $this->response->header('Content-Type', 'application/json');
        $this->response->setBody(json_encode($data, JSON_PRETTY_PRINT));
    }
}

