<?php
namespace TicketBundle\Tests\Service;

use Keboola\Csv\CsvFile;
use TicketBundle\Importer\Event\CsvImporter;

/**
 * Class CsvImporterTest
 * @package TicketBundle\Tests\Service
 */
class CsvImporterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test import
     */
    public function testImport()
    {
        $eventRepositoryMock = $this->getEventRepositoryMock();

        $eventServiceMock = $this->getEventServiceMock(['createEvent'], $eventRepositoryMock);

        $csvFile = new CsvFile(__DIR__ . '/feeds/events.csv', ';');

        $eventServiceMock->expects($this->exactly(3))
            ->method('createEvent');

        $csvImport = new CsvImporter($eventServiceMock, $csvFile);
        $csvImport->import();
    }

    /**
     * Test import with to many csv columns
     */
    public function testImportWithToManyCsvColumns()
    {
        $eventRepositoryMock = $this->getEventRepositoryMock();

        $eventServiceMock = $this->getEventServiceMock(['createEvent'], $eventRepositoryMock);

        $csvFile = new CsvFile(__DIR__ . '/feeds/events_to_many_columns.csv', ';');

        $eventServiceMock->expects($this->exactly(2))
            ->method('createEvent');

        $this->setExpectedException('TicketBundle\Importer\Event\Exception\InvalidRowException');

        $csvImport = new CsvImporter($eventServiceMock, $csvFile);
        $csvImport->import();
    }

    /**
     * @param null $methods
     * @param null $eventService
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getEventServiceMock($methods = null, $eventService = null)
    {
        $service = $this->getMockBuilder('TicketBundle\Service\EventService')
            ->setConstructorArgs([$eventService])
            ->setMethods($methods)
            ->getMock();

        return $service;
    }

    /**
     * @param array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getEventRepositoryMock(array $methods = null)
    {
        $repository = $this->getMockBuilder('TicketBundle\Repository\EventRepository')
            ->disableOriginalConstructor()
            ->setMethods($methods)
            ->getMock();

        return $repository;
    }
}