<?php
namespace TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TicketBundle\Entity\EventTicket;
use TicketBundle\Resolver\Form\OrderFormResolver;

/**
 * Class TicketController
 * @package TicketBundle\Controller
 */
class TicketController extends Controller
{
    /**
     * This action renders the landing page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('TicketBundle:Ticket:index.html.twig');
    }

    /**
     * This action renders the ticket order page
     *
     * @param EventTicket $eventTicket
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderAction(EventTicket $eventTicket, Request $request)
    {
        $errors = [];

        $maximumNumberOfTicketsPerPerson = $this->getParameter('maximum_number_of_tickets_per_person');

        $orderFormResolver = $this->getOrderFormResolver($request);
        $orderFormResolver->setEventTicket($eventTicket);
        $orderForm = $orderFormResolver->getForm();

        $validator = $this->getValidatorService();

        if ($request->isMethod('POST')) {

            $errors = $validator->validate($orderForm);

            if (count($errors) === 0) {
                $customerTicketService = $this->getCustomerTicketService();
                $customerTicketService->createCustomerTicket($orderForm);

                return $this->redirect($this->generateUrl('ticket_thank_you'));
            }
        }

        return $this->render('TicketBundle:Ticket:order.html.twig', [
            'form' => $orderForm,
            'event' => $eventTicket->getEvent(),
            'eventTicket' => $eventTicket,
            'maximumNumberOfTicketsPerPerson' => $maximumNumberOfTicketsPerPerson,
            'errors' => $errors
        ]);
    }

    /**
     * This actions renders the thank you page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function thankYouAction()
    {
        return $this->render('TicketBundle:Ticket:thank_you.html.twig');
    }

    /**
     * @param Request $request
     * @return OrderFormResolver
     */
    private function getOrderFormResolver(Request $request)
    {
        $orderFormResolver = new OrderFormResolver();
        $orderFormResolver->resolve($request);

        return $orderFormResolver;
    }

    /**
     * @return \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    private function getValidatorService()
    {
        return $this->get('validator');
    }

    /**
     * @return \TicketBundle\Service\CustomerTicketService
     */
    private function getCustomerTicketService()
    {
        return $this->get('customer_ticket.service');
    }
}
