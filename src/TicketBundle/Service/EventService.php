<?php
namespace TicketBundle\Service;

use TicketBundle\Entity\Event;
use TicketBundle\Repository\EventRepository;

/**
 * Class EventService
 * @package TicketBundle\Service
 */
class EventService
{
    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Find all events
     *
     * @return array
     */
    public function findAllEvents()
    {
        return $this->eventRepository->findAll();
    }

    /**
     * Create a new event
     *
     * @param string $name
     * @param string $description
     * @param string $location
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param null|string $website
     */
    public function createEvent(
        $name,
        $description,
        $location,
        \DateTime $startDate,
        \DateTime $endDate,
        $website = null
    ) {
        $currentDate = new \DateTime();

        $event = new Event();
        $event->setName($name);
        $event->setDescription($description);
        $event->setLocation($location);
        $event->setStartDate($startDate);
        $event->setEndDate($endDate);
        $event->setWebsite($website);
        $event->setCreatedOn($currentDate);
        $event->setUpdatedOn($currentDate);

        $this->eventRepository->save($event);
    }
}