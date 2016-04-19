<?php
namespace TicketBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class EmailExists
 * @package TicketBundle\Validator\Constraints
 */
class EmailExists extends Constraint
{
    /**
     * @var string
     */
    public $message;

    /**
     * @return string
     */
    public function validatedBy()
    {
        return 'email_exists';
    }
}