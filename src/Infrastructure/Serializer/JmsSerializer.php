<?php

namespace App\Infrastructure\Serializer;

use JMS\Serializer\Serializer;
use Symfony\Component\DependencyInjection\Container;

class JmsSerializer
{
    private Serializer $serializer;

    public function __construct(Container $container)
    {
        $this->serializer = $container->get('jms_serializer');
    }

    public function fromArray(array $array, string $object): mixed
    {
        return $this->serializer->fromArray($array, $object);
    }
}