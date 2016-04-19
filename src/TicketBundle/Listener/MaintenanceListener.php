<?php
namespace TicketBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Class MaintenanceListener
 * @package TicketBundle\Listener
 */
class MaintenanceListener
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $maintenanceUntil = $this->container->hasParameter('underMaintenanceUntil') ? $this->container->getParameter('underMaintenanceUntil') : false;
        $maintenance = $this->container->hasParameter('maintenance') ? $this->container->getParameter('maintenance') : false;

        $debug = in_array($this->container->get('kernel')->getEnvironment(), array('test', 'dev'));

        if ($maintenance && !$debug) {
            $engine = $this->container->get('templating');
            $content = $engine->render('::maintenance.html.twig', array('maintenanceUntil'=>$maintenanceUntil));
            $event->setResponse(new Response($content, 503));
            $event->stopPropagation();
        }

    }
}