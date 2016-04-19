<?php
namespace TicketBundle\Importer\Event;

use Keboola\Csv\CsvFile;
use TicketBundle\Importer\Event\Exception\InvalidRowException;
use TicketBundle\Importer\ImporterInterface;
use TicketBundle\Service\EventService;

/**
 * Class CsvImporter
 * @package TicketBundle\Importer
 */
class CsvImporter implements ImporterInterface
{
    /**
     * @var string
     */
    const DELIMITER = ';';

    /**
     * @var int
     */
    const COLUMNS_PER_ROW = 6;

    /**
     * @var EventService;
     */
    private $eventService;

    /**
     * @var CsvFile
     */
    private $csvFile;

    /**
     * @param EventService $eventService
     * @param CsvFile $csvFile
     */
    public function __construct(EventService $eventService, CsvFile $csvFile)
    {
        $this->eventService = $eventService;
        $this->csvFile = $csvFile;
    }

    /**
     * @inheritdoc
     */
    public function import()
    {
        foreach ($this->csvFile as $line => $row) {

            $this->validateRow($line + 1, $row);

            $name = $row[0];
            $description = $row[1];
            $location = $row[2];
            $startDate = new \DateTime($row[3]);
            $endDate = new \DateTime($row[4]);
            $website = $row[5];

            $this->eventService->createEvent($name, $description, $location, $startDate, $endDate, $website);
        }
    }

    /**
     * @param int $line
     * @param array $row
     * @throws InvalidRowException
     */
    private function validateRow($line, array $row)
    {
        if (count($row) != self::COLUMNS_PER_ROW) {
            throw InvalidRowException::incorrectColumnCount($line, $row, self::COLUMNS_PER_ROW);
        }
    }
}
