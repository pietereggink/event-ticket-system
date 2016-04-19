<?php
namespace TicketBundle\Importer\Event\Exception;

/**
 * Class InvalidRowException
 * @package TicketBundle\Importer\Event\Exception
 */
class InvalidRowException extends \Exception
{
    /**
     * @param int $line
     * @param string $reason
     * @return static
     */
    public static function create($line, $reason)
    {
        return new static(sprintf('Row %u is invalid because: %s', $line, $reason));
    }

    /**
     * @param int $line
     * @param array $row
     * @param int $columnsPerRow
     * @return InvalidRowException
     */
    public static function incorrectColumnCount($line, array $row, $columnsPerRow)
    {
        return static::create(
            $line,
            sprintf('Columns count %u is incorrect, max %u columns per row',
                count($row),
                $columnsPerRow
            )
        );
    }
}