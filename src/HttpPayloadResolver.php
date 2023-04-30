<?php

namespace Fesor\RequestObject;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class HttpPayloadResolver
 *
 * @package Fesor\RequestObject
 */
class HttpPayloadResolver implements PayloadResolver
{
    /**
     * {@inheritdoc}
     */
    public function resolvePayload(Request $request)
    {
        if ($this->shouldNotHasRequestBody($request->getMethod())) {
            return $request->query->all();
        }

        return array_merge(
            $request->request->all(),
            $request->files->all()
        );
    }

    /**
     * @param $methodName
     *
     * @return bool
     */
    private function shouldNotHasRequestBody($methodName)
    {
        return in_array($methodName, ['GET', 'HEAD', 'DELETE'], true);
    }
}
