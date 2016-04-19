<?php
namespace TicketBundle\Entity;

/**
 * EventTicket
 */
class EventTicket
{
    /**
     * @var integer
     */
    private $eventId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $price;

    /**
     * @var integer
     */
    private $availableTickets;

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
     * Set eventId
     *
     * @param integer $eventId
     * @return EventTicket
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    /**
     * Get eventId
     *
     * @return integer 
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return EventTicket
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return EventTicket
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return EventTicket
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
     * Set availableTickets
     *
     * @param integer $availableTickets
     * @return EventTicket
     */
    public function setAvailableTickets($availableTickets)
    {
        $this->availableTickets = $availableTickets;
    }

    /**
     * Get availableTickets
     *
     * @return integer 
     */
    public function getAvailableTickets()
    {
        return $this->availableTickets;
    }

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     * @return EventTicket
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
     * @return EventTicket
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
     * @var Event
     */
    private $event;

    /**
     * Set event
     *
     * @param Event $event
     * @return EventTicket
     */
    public function setEvent(Event $event = null)
    {
        $this->event = $event;
    }

    /**
     * Get event
     *
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }
}
