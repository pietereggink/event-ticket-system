<?php
namespace TicketBundle\Importer;

/**
 * Interface ImporterInterface
 * @package TicketBundle\Importer
 */
interface ImporterInterface
{
    /**
     * @return mixed
     */
    public function import();
}