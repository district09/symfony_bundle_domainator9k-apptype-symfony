<?php

namespace DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\CacheClearer;

use DigipolisGent\CommandBuilder\CommandBuilder;
use DigipolisGent\Domainator9k\CoreBundle\CacheClearer\CacheClearerInterface;
use DigipolisGent\Domainator9k\CoreBundle\CLI\CliInterface;

class SymfonyTwoCacheClearer implements CacheClearerInterface
{

    /**
     * {@inheritdoc}
     */
    public function clearCache($object, CliInterface $cli)
    {
        return $cli->execute(
            CommandBuilder::create('bin/console')
                ->addArgument('cache:clear')
                ->addOption('env', 'prod')
        );
    }
}
