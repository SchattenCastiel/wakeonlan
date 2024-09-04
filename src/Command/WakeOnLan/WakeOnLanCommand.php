<?php

namespace App\Command\WakeOnLan;

use App\Business\WakeOnLan\WakeOnLanUseCase;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'network:lan:wake')]
class WakeOnLanCommand extends Command
{
    public function __construct(
        private WakeOnLanUseCase $wakeOnLanUseCase,
    ) {
    }

    public function configure(): void
    {
        $this
            ->setDescription('Sends a wake on lan command to a specific mac address in network')
            ->setHelp('This command allows you to send a magic package to a specific mac address in network')
            ->addArgument('mac', InputArgument::REQUIRED, 'MAC address')
            ->addArgument('broadcast', InputArgument::REQUIRED, 'Broadcast address of the servers network to wake');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $macAddress = $input->getArgument('mac');
        $broadcast = $input->getArgument('broadcast');

        $output->writeln($this->wakeOnLanUseCase->__invoke($macAddress, $broadcast));
        $output->writeln('###### Check your server if it is online now! #####');

        return Command::SUCCESS;
    }
}