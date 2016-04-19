<?php
namespace TicketBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use TicketBundle\Service\CustomerService;

/**
 * Class EmailExistsValidator
 * @package TicketBundle\Validator
 */
class EmailExistsValidator extends ConstraintValidator
{
    /**
     * @var CustomerService
     */
    private $customerService;

    /**
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * @param string $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if ($this->customerService->emailAddressExists($value)) {
            $this->context->addViolation($constraint->message);
        }
    }
}

