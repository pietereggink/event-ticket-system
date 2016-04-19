<?php
namespace TicketBundle\Service;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TicketBundle\Importer\ImporterInterface;

/**
 * Class EventImporterService
 * @package TicketBundle\Service
 */
class EventImporterService
{
    /**
     * @var ImporterInterface[]
     */
    private $importers;

    /**
     * @param string $name
     * @param ImporterInterface $importer
     */
    public function registerImporter($name, ImporterInterface $importer)
    {
        $this->importers[$name] = $importer;
    }

    /**
     * Run all importers
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->importers as $name => $importer) {
            $output->writeln(sprintf('Importing feed with "%s" importer', $name));
            $importer->import();
        }
    }
}