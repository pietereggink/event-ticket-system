<?php
namespace TicketBundle\Tests\Service;

use TicketBundle\Entity\EventTicket;
use TicketBundle\Entity\Form\OrderForm;
use TicketBundle\Service\CustomerTicketService;

/**
 * Class CustomerTicketServiceTest
 * @package TicketBundle\Tests\Service
 */
class CustomerTicketServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EventTicket
     */
    private $eventTicket;

    /**
     * @var OrderForm
     */
    private $orderForm;

    /**
     * Setup
     */
    protected function setUp()
    {
        $this->eventTicket = new EventTicket();

        $this->orderForm = new OrderForm();
        $this->orderForm->setEmail('email');
        $this->orderForm->setNumberOfTickets(3);
        $this->orderForm->setEventTicket($this->eventTicket);
        $this->orderForm->setFirstName('FirstName');
        $this->orderForm->setLastName('LastName');
    }

    /**
     * Test create customer ticket
     */
    public function testCreateCustomerTicket()
    {
        $customerRepositoryMock = $this->getCustomerRepositoryMock(['save']);
        $customerServiceMock = $this->getCustomerServiceMock(['createCustomer'], $customerRepositoryMock);
        $customerTicketRepositoryMock = $this->getCustomerTicketRepositoryMock(['save']);

        $customerServiceMock->expects($this->once())
            ->method('createCustomer');

        $customerTicketRepositoryMock->expects($this->once())
            ->method('save');

        $customerTicketService = new CustomerTicketService($customerServiceMock, $customerTicketRepositoryMock);
        $customerTicketService->createCustomerTicket($this->orderForm);
    }

    /**
     * @param null $methods
     * @param null $customerServiceRepository
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getCustomerServiceMock($methods = null, $customerServiceRepository = null)
    {
        $service = $this->getMockBuilder('TicketBundle\Service\CustomerService')
            ->setConstructorArgs([$customerServiceRepository])
            ->setMethods($methods)
            ->getMock();

        return $service;
    }

    /**
     * @param array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getCustomerRepositoryMock(array $methods = null)
    {
        $repository = $this->getMockBuilder('TicketBundle\Repository\CustomerRepository')
            ->disableOriginalConstructor()
            ->setMethods($methods)
            ->getMock();

        return $repository;
    }

    /**
     * @param array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getCustomerTicketRepositoryMock(array $methods = null)
    {
        $repository = $this->getMockBuilder('TicketBundle\Repository\CustomerTicketRepository')
            ->disableOriginalConstructor()
            ->setMethods($methods)
            ->getMock();

        return $repository;
    }
}