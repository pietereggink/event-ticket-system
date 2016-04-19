<?php
namespace TicketBundle\Entity\Form;

use TicketBundle\Entity\EventTicket;

/**
 * Class OrderForm
 * @package TicketBundle\Entity
 */
class OrderForm
{
    /**
     * @var int
     */
    private $numberOfTickets;

    /**
     * @var string
     */
    private $firstName = '';

    /**
     * @var string
     */
    private $lastName = '';

    /**
     * @var string
     */
    private $email = '';

    /**
     * @var EventTicket
     */
    private $eventTicket = null;

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
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return EventTicket
     */
    public function getEventTicket()
    {
        return $this->eventTicket;
    }

    /**
     * @param EventTicket $eventTicket
     */
    public function setEventTicket(EventTicket $eventTicket)
    {
        $this->eventTicket = $eventTicket;
    }
}