<?php
namespace TicketBundle\Entity;

/**
 * CustomerTicket
 */
class CustomerTicket
{
    /**
     * @var integer
     */
    private $eventTicketId;

    /**
     * @var integer
     */
    private $customerId;

    /**
     * @var string
     */
    private $price;

    /**
     * @var int
     */
    private $numberOfTickets;

    /**
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @var \DateTime
     */
    private $updatedOn;

    /**
     * @var integer
     */
    private $id;

    /**
     * Set eventTicketId
     *
     * @param integer $eventTicketId
     * @return CustomerTicket
     */
    public function setEventTicketId($eventTicketId)
    {
        $this->eventTicketId = $eventTicketId;
    }

    /**
     * Get eventTicketId
     *
     * @return integer
     */
    public function getEventTicketId()
    {
        return $this->eventTicketId;
    }

    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return CustomerTicket
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * Get customerId
     *
     * @return integer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return CustomerTicket
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getNumberOfTickets()
    {
        return $this->numberOfTickets;
    }

    /**
     * @param int $numberOfTickets
     */
    public function setNumberOfTickets($numberOfTickets)
    {
        $this->numberOfTickets = $numberOfTickets;
    }

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     * @return CustomerTicket
     */
    public function setCreatedOn(\DateTime $createdOn)
    {
        $this->createdOn = $createdOn;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set updatedOn
     *
     * @param \DateTime $updatedOn
     * @return CustomerTicket
     */
    public function setUpdatedOn(\DateTime $updatedOn)
    {
        $this->updatedOn = $updatedOn;
    }

    /**
     * Get updatedOn
     *
     * @return \DateTime
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var EventTicket
     */
    private $eventTicket;


    /**
     * Set customer
     *
     * @param Customer $customer
     * @return CustomerTicket
     */
    public function setCustomer(Customer $customer = null)
    {
        $this->customer = $customer;
    }

    /**
     * Get customer
     *
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set eventTicket
     *
     * @param EventTicket $eventTicket
     * @return CustomerTicket
     */
    public function setEventTicket(EventTicket $eventTicket = null)
    {
        $this->eventTicket = $eventTicket;
    }

    /**
     * Get eventTicket
     *
     * @return EventTicket
     */
    public function getEventTicket()
    {
        return $this->eventTicket;
    }
}
