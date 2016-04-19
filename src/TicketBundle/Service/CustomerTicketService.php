<?php
namespace TicketBundle\Service;

use TicketBundle\Entity\CustomerTicket;
use TicketBundle\Entity\Form\OrderForm;
use TicketBundle\Entity\Ticket;
use TicketBundle\Repository\CustomerTicketRepository;

/**
 * Class CustomerTicketService
 * @package TicketBundle\Service
 */
class CustomerTicketService
{
    /**
     * @var CustomerService
     */
    private $customerService;

    /**
     * @var CustomerTicketRepository
     */
    private $customerTicketRepository;

    /**
     * @param CustomerService $customerService
     * @param CustomerTicketRepository $customerTicketRepository
     */
    public function __construct(
        CustomerService $customerService,
        CustomerTicketRepository $customerTicketRepository
    ) {
        $this->customerService = $customerService;
        $this->customerTicketRepository = $customerTicketRepository;
    }

    /**
     * Create a new customer ticket
     *
     * @param OrderForm $orderForm
     */
    public function createCustomerTicket(OrderForm $orderForm)
    {
        $currentDate = new \DateTime();

        // Create customer
        $customer = $this->customerService->createCustomer(
            $orderForm->getFirstName(),
            $orderForm->getLastName(),
            $orderForm->getEmail()
        );

        // Create customer ticket
        $customerTicket = new CustomerTicket();
        $customerTicket->setCustomer($customer);
        $customerTicket->setEventTicket($orderForm->getEventTicket());
        $customerTicket->setPrice($orderForm->getEventTicket()->getPrice());
        $customerTicket->setNumberOfTickets($orderForm->getNumberOfTickets());
        $customerTicket->setCreatedOn($currentDate);
        $customerTicket->setUpdatedOn($currentDate);

        $this->customerTicketRepository->save($customerTicket);
    }
}