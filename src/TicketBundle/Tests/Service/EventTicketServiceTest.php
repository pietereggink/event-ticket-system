<?php
namespace TicketBundle\Tests\Service;

use TicketBundle\Entity\Event;
use TicketBundle\Service\EventTicketService;

/**
 * Class EventTicketServiceTest
 * @package TicketBundle\Tests\Service
 */
class EventTicketServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test find tickets by event
     */
    public function testFindTicketsByEvent()
    {
        $eventTicketRepositoryMock = $this->getEventTicketRepositoryMock(['findBy']);

        $eventTicketRepositoryMock->expects($this->once())
            ->method('findBy');

        $eventService = new EventTicketService($eventTicketRepositoryMock);

        $event = new Event();

        $eventService->findTicketsByEvent($event);
    }

    /**
     * @param array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getEventTicketRepositoryMock(array $methods = null)
    {
        $repository = $this->getMockBuilder('TicketBundle\Repository\EventTicketRepository')
            ->disableOriginalConstructor()
            ->setMethods($methods)
            ->getMock();

        return $repository;
    }
}