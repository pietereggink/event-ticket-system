<?php
namespace TicketBundle\Importer\Event;

use Sabre\Xml\Reader;
use Sabre\Xml\Service;
use TicketBundle\Importer\Event\Exception\InvalidElementException;
use TicketBundle\Importer\ImporterInterface;
use TicketBundle\Service\EventService;

/**
 * Class XmlImporter
 * @package TicketBundle\Importer
 */
class XmlImporter implements ImporterInterface
{
    /**
     * @var int
     */
    const ELEMENTS_PER_EVENT_ELEMENT = 6;

    /**
     * @var EventService;
     */
    private $eventService;

    /**
     * @var Service
     */
    private $xmlService;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @param EventService $eventService
     * @param Service $xmlService
     * @param sting$fileName
     */
    public function __construct(EventService $eventService, Service $xmlService, $fileName)
    {
        $this->eventService = $eventService;
        $this->xmlService = $xmlService;
        $this->fileName = $fileName;

        $this->defineElementMap();
    }

    /**
     * @inheritdoc
     */
    public function import()
    {
        $events = $this->xmlService->parse(file_get_contents($this->fileName));

        foreach ($events as $line => $event) {
            $this->validateElement($line + 1, $event);

            $this->eventService->createEvent(
                $event['name'],
                $event['description'],
                $event['location'],
                new \DateTime($event['startDate']),
                new \DateTime($event['endDate']),
                $event['website']
            );
        }
    }

    /**
     * Define element map
     */
    private function defineElementMap()
    {
        $this->xmlService->elementMap = [
            '{http://example.org/events}event' => function(Reader $reader) {
                return \Sabre\Xml\Deserializer\keyValue($reader, 'http://example.org/events');
            },
            '{http://example.org/events}events' => function(Reader $reader) {
                return \Sabre\Xml\Deserializer\repeatingElements($reader, '{http://example.org/events}event');
            },
        ];
    }

    /**
     * @param int $line
     * @param array $row
     * @throws InvalidElementException
     */
    private function validateElement($line, array $row)
    {
        if (count($row) != self::ELEMENTS_PER_EVENT_ELEMENT) {
            throw InvalidElementException::incorrectElementCount($line, $row, self::ELEMENTS_PER_EVENT_ELEMENT);
        }
    }
}
