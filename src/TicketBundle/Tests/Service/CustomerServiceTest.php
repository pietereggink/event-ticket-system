<?php
namespace TicketBundle\Tests\Service;

use TicketBundle\Entity\Customer;
use TicketBundle\Service\CustomerService;

/**
 * Class CustomerServiceTest
 * @package TicketBundle\Tests\Service
 */
class CustomerServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * Setup
     */
    protected function setUp()
    {
        $this->customer = new Customer();
        $this->customer->setEmail('test-user@domain.com');
    }

    /**
     * Test create customer
     */
    public function testCreateCustomer()
    {
        $customerRepositoryMock = $this->getCustomerRepositoryMock(['save']);

        $customerRepositoryMock->expects($this->once())
            ->method('save');

        $customerService = new CustomerService($customerRepositoryMock);
        $customerService->createCustomer('Pieter', 'Eggink', 'pietereggink@hotmail.com');
    }

    /**
     * Test email address exists
     */
    public function testEmailAddressExists()
    {
        $customerRepositoryMock = $this->getCustomerRepositoryMock(['findOneBy']);

        $customerRepositoryMock->expects($this->once())
            ->method('findOneBy')
            ->willReturn($this->customer);

        $customerService = new CustomerService($customerRepositoryMock);

        $expectedResult = true;
        $actualResult = $customerService->emailAddressExists('test-user@domain.com');

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * Test email address does not exist
     */
    public function testEmailAddressDoesNotExist()
    {
        $customerRepositoryMock = $this->getCustomerRepositoryMock(['findOneBy']);

        $customerRepositoryMock->expects($this->once())
            ->method('findOneBy')
            ->willReturn(null);

        $customerService = new CustomerService($customerRepositoryMock);

        $expectedResult = false;
        $actualResult = $customerService->emailAddressExists('test-user@domain.com');

        $this->assertEquals($expectedResult, $actualResult);
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
}