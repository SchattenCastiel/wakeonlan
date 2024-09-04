<?php

namespace App\Controller\WakeOnLan\Dto;

class WakeOnLanDto
{
    public function __construct(
        public readonly string $mac,
        public readonly string $broadcast,
    ) {
    }
}