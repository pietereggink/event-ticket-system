<?php
namespace TicketBundle\Service;

use TicketBundle\Entity\Event;
use TicketBundle\Repository\EventTicketRepository;

/**
 * Class EventTicketService
 * @package TicketBundle\Service
 */
class EventTicketService
{
    /**
     * @var EventTicketRepository
     */
    private $eventTicketRepository;

    /**
     * @param EventTicketRepository $eventTicketRepository
     */
    public function __construct(EventTicketRepository $eventTicketRepository)
    {
        $this->eventTicketRepository = $eventTicketRepository;
    }

    /**
     * Find tickets by a given event
     *
     * @param Event $event
     * @return array
     */
    public function findTicketsByEvent(Event $event)
    {
        return $this->eventTicketRepository->findBy(['event' => $event]);
    }
}