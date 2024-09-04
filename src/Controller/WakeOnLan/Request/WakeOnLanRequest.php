<?php

namespace App\Controller\WakeOnLan\Request;

use App\Controller\WakeOnLan\Dto\WakeOnLanDto;
use App\Infrastructure\Request\AbstractJmsRequest;

class WakeOnLanRequest extends AbstractJmsRequest
{
    protected function getRequestObject(): string
    {
        return WakeOnLanDto::class;
    }
}