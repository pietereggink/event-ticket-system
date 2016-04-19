<?php
namespace TicketBundle\Tests\Service;

use Sabre\Xml\Service;
use TicketBundle\Importer\Event\XmlImporter;

/**
 * Class XmlImporterTest
 * @package TicketBundle\Tests\Service
 */
class XmlImporterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test import
     */
    public function testImport()
    {
        $eventRepositoryMock = $this->getEventRepositoryMock();

        $eventServiceMock = $this->getEventServiceMock(['createEvent'], $eventRepositoryMock);

        $xmlService = new Service();

        $fileName = __DIR__ . '/feeds/events.xml';

        $eventServiceMock->expects($this->exactly(2))
            ->method('createEvent');

        $csvImport = new XmlImporter($eventServiceMock, $xmlService, $fileName);
        $csvImport->import();
    }

    /**
     * Test import with to many xml elements
     */
    public function testImportWithToManyXmlElements()
    {
        $eventRepositoryMock = $this->getEventRepositoryMock();

        $eventServiceMock = $this->getEventServiceMock(['createEvent'], $eventRepositoryMock);

        $xmlService = new Service();

        $fileName = __DIR__ . '/feeds/events_to_many_elements.xml';

        $eventServiceMock->expects($this->exactly(1))
            ->method('createEvent');

        $this->setExpectedException('TicketBundle\Importer\Event\Exception\InvalidElementException');

        $csvImport = new XmlImporter($eventServiceMock, $xmlService, $fileName);
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