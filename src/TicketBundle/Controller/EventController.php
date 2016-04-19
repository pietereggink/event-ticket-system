<?php
namespace TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TicketBundle\Entity\Event;

/**
 * Class EventController
 * @package TicketBundle\Controller
 */
class EventController extends Controller
{
    /**
     * This action renders the overview page with events
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function overviewAction()
    {
        $eventService = $this->getEventService();

        $events = $eventService->findAllEvents();

        return $this->render('TicketBundle:Event:overview.html.twig', [
            'events' => $events
        ]);
    }

    /**
     * This action renders the event tickets page
     *
     * @param Event $event
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ticketsAction(Event $event)
    {
        $eventTicketService = $this->getEventTicketService();

        $eventTickets = $eventTicketService->findTicketsByEvent($event);

        return $this->render('TicketBundle:Event:tickets.html.twig', [
            'event' => $event,
            'eventTickets' => $eventTickets
        ]);
    }

    /**
     * @return \TicketBundle\Service\EventService
     */
    private function getEventService()
    {
        return $this->get('event.service');
    }

    /**
     * @return \TicketBundle\Service\EventTicketService
     */
    private function getEventTicketService()
    {
        return $this->get('event_ticket.service');
    }
}
