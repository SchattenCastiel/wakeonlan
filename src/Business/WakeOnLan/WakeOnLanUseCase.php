<?php

namespace App\Business\WakeOnLan;

use App\Command\WakeOnLan\WakeOnLanCommand;

class WakeOnLanUseCase
{
    private const WAKE_ON_LAN_COMMAND = 'wakeonlan -i %s %s';

    public function __invoke(string $macAddress, string $broadcast): string
    {
        return shell_exec(sprintf(self::WAKE_ON_LAN_COMMAND, $broadcast, $macAddress));
    }
}