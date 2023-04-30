<?php

namespace Fesor\RequestObject\Bundle;

use Fesor\RequestObject\Bundle\DependeyInjection\RequestObjectExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class RequestObjectBundle
 *
 * @package Fesor\RequestObject\Bundle
 */
class RequestObjectBundle extends Bundle
{
    /**
     * @return string
     */
    protected function getContainerExtensionClass(): string
    {
        return RequestObjectExtension::class;
    }
}
