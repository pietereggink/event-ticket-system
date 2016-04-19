<?php
namespace TicketBundle\Importer\Event\Exception;

/**
 * Class InvalidElementException
 * @package TicketBundle\Importer\Event\Exception
 */
class InvalidElementException extends \Exception
{
    /**
     * @param int $line
     * @param string $reason
     * @return static
     */
    public static function create($line, $reason)
    {
        return new static(sprintf('Element %u is invalid because: %s', $line, $reason));
    }

    /**
     * @param int $line
     * @param array $row
     * @param int $elementsPerEventElement
     * @return InvalidElementException
     */
    public static function incorrectElementCount($line, array $row, $elementsPerEventElement)
    {
        return static::create(
            $line,
            sprintf('Element count %u is incorrect, max %u elements per element',
                count($row),
                $elementsPerEventElement
            )
        );
    }
}