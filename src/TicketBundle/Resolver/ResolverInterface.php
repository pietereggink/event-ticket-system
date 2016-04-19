<?php
namespace TicketBundle\Resolver;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ResolverInterface
 * @package TicketBundle\Resolver
 */
interface ResolverInterface
{
    /**
     * @param Request $request
     */
    public function resolve(Request $request);
}