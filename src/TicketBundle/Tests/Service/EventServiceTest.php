<?php
namespace TicketBundle\Tests\Service;

use TicketBundle\Service\EventService;

/**
 * Class EventServiceTest
 * @package TicketBundle\Tests\Service
 */
class EventServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create event
     */
    public function testCreateEvent()
    {
        $currentDate = new \DateTime();

        $eventRepositoryMock = $this->getEventRepositoryMock(['save']);

        $eventRepositoryMock->expects($this->once())
            ->method('save');

        $eventService = new EventService($eventRepositoryMock);
        $eventService->createEvent('Event A', 'Nice event', 'Amsterdam', $currentDate, $currentDate, 'www.domain.com');
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