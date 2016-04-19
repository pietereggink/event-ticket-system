<?php
namespace TicketBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TicketBundle\Importer\Event\Exception\InvalidRowException;
use TicketBundle\Service\EventImporterService;

/**
 * Class EventImporterCommand
 * @package TicketBundle\Command
 */
class EventImporterCommand extends Command
{
    /**
     * @var EventImporterService
     */
    private $eventImporterService;

    /**
     * @param EventImporterService $eventImporterService
     */
    public function __construct(EventImporterService $eventImporterService)
    {
        $this->eventImporterService = $eventImporterService;

        parent::__construct();
    }

    /**
     * Configure
     */
    protected function configure()
    {
        $this
            ->setName('event:importer')
            ->setDescription('Import all event feeds');
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->eventImporterService->run($input, $output);
        } catch (InvalidRowException $e) {
            $output->writeln($e->getMessage());
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}