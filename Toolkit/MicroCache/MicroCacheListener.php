<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\MicroCache;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;

class MicroCacheListener
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if ($event->getRequest()->isMethod('GET') && $this->container->getParameter('symfony_id.core.use_cache')) {
            $response = $event->getResponse();
            $lifetime = $this->container->getParameter('symfony_id.core.cache_lifetime');

            $response->setPublic();
            $response->setMaxAge($lifetime);
            $response->setSharedMaxAge($lifetime);
            $response->setETag(md5($response->getContent()));
        }
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if ($request->isMethod('GET') && $this->container->getParameter('symfony_id.core.use_cache')) {
            $response = new Response();

            if ($response->isNotModified($request)) {
                $event->setResponse($response);
            }
        }
    }
}
