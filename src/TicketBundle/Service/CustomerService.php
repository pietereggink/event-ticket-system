<?php
namespace TicketBundle\Service;

use TicketBundle\Entity\Customer;
use TicketBundle\Entity\Ticket;
use TicketBundle\Repository\CustomerRepository;

/**
 * Class CustomerService
 * @package TicketBundle\Service
 */
class CustomerService
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Create a new customer
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @return Customer
     */
    public function createCustomer($firstName, $lastName, $email)
    {
        $currentDate = new \DateTime();

        $customer = new Customer();
        $customer->setFirstName($firstName);
        $customer->setLastName($lastName);
        $customer->setEmail($email);
        $customer->setCreatedOn($currentDate);
        $customer->setUpdatedOn($currentDate);

        $this->customerRepository->save($customer);

        return $customer;
    }

    /**
     * Check if the given email address already exist
     *
     * @param string $email
     * @return bool
     */
    public function emailAddressExists($email)
    {
        $customer = $this->customerRepository->findOneBy(['email' => $email]);

        if ($customer) {
            return true;
        }

        return false;
    }
}