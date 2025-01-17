<?php

namespace Fesor\RequestObject;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Interface ErrorResponseProvider
 *
 * @package Fesor\RequestObject
 */
interface ErrorResponseProvider
{
    /**
     * Returns error response in case of invalid request data.
     *
     * @param ConstraintViolationListInterface $errors
     *
     * @return Response
     */
    public function getErrorResponse(ConstraintViolationListInterface $errors);
}
