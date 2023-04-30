<?php

namespace Fesor\RequestObject;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Exception\ValidatorException;

/**
 * Class InvalidRequestPayloadException
 *
 * @package Fesor\RequestObject
 */
class InvalidRequestPayloadException extends ValidatorException
{
    /**
     * InvalidRequestPayloadException constructor.
     *
     * @param RequestObject                    $requestObject
     * @param ConstraintViolationListInterface $errors
     */
    public function __construct(private RequestObject $requestObject, private ConstraintViolationListInterface $errors)
    {
        parent::__construct();
    }

    /**
     * @return RequestObject
     */
    public function getRequestObject(): RequestObject
    {
        return $this->requestObject;
    }

    /**
     * @return ConstraintViolationListInterface
     */
    public function getErrors(): ConstraintViolationListInterface
    {
        return $this->errors;
    }
}
