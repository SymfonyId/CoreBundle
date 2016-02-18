<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ApcCacheCleanerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('sicore:cache:clear-apc')
            ->setDescription('Clear apc cache command')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->clearApc()) {
            $output->writeln('<info>Flushing Apc Cache.</info>');
        } else {
            $output->writeln('<comment>Apc is not installed.</comment>');
        }

        $output->writeln('<info>Finish.</info>');
    }

    private function clearApc()
    {
        return function_exists('apc_clear_cache') && apc_clear_cache() && apc_clear_cache('user') && apc_clear_cache('opcode');
    }
}