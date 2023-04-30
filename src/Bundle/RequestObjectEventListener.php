<?php

namespace Fesor\RequestObject\Bundle;

use Fesor\RequestObject\RequestObjectBinder;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

/**
 * Class RequestObjectEventListener
 *
 * @package Fesor\RequestObject\Bundle
 */
class RequestObjectEventListener
{
    /**
     * RequestObjectEventListener constructor.
     *
     * @param RequestObjectBinder $requestBinder
     */
    public function __construct(private RequestObjectBinder $requestBinder)
    {
    }

    /**
     * @param ControllerEvent $event
     */
    public function onKernelController(ControllerEvent $event)
    {
        $request = $event->getRequest();
        $controller = $event->getController();

        $errorResponse = $this->requestBinder->bind($request, $controller);

        if (null === $errorResponse) {
            return;
        }

        $event->setController(function () use ($errorResponse) {
            return $errorResponse;
        });
    }
}
