<?php

namespace App\Infrastructure\Request;

use App\Infrastructure\Serializer\JmsSerializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class AbstractJmsRequest
{
    private mixed $serializedObject;

    public function __construct(
        RequestStack $requestStack,
        JmsSerializer $jmsSerializer,
    ) {
        $this->serializedObject = $jmsSerializer->fromArray($requestStack->getCurrentRequest()->toArray(), $this->getRequestObject());
    }

    public function getSerializedObject(): mixed
    {
        return $this->serializedObject;
    }

    protected abstract function getRequestObject(): string;
}