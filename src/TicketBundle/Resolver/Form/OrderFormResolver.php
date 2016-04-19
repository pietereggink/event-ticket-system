<?php
namespace TicketBundle\Resolver\Form;

use Symfony\Component\HttpFoundation\Request;
use TicketBundle\Entity\EventTicket;
use TicketBundle\Entity\Form\OrderForm;
use TicketBundle\Resolver\ResolverInterface;

/**
 * Class OrderFormResolver
 * @package TicketBundle\Resolver\Form
 */
class OrderFormResolver implements ResolverInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var OrderForm
     */
    private $orderForm;

    /**
     * @param Request $request
     */
    public function resolve(Request $request)
    {
        $this->request = $request;

        $this->orderForm = new OrderForm();
        $this->orderForm->setNumberOfTickets($this->request->request->get('number_of_tickets'));
        $this->orderForm->setFirstName($this->request->request->get('firstName'));
        $this->orderForm->setLastName($this->request->request->get('lastName'));
        $this->orderForm->setEmail($this->request->request->get('email'));
    }

    /**
     * @param EventTicket $eventTicket
     */
    public function setEventTicket(EventTicket $eventTicket)
    {
        $this->orderForm->setEventTicket($eventTicket);
    }

    /**
     * @return OrderForm
     */
    public function getForm()
    {
        return $this->orderForm;
    }
}