<?php

namespace ContainerIlxg776;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_NWz6gvWService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.NWz6gvW' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.NWz6gvW'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'coachRepository' => ['privates', 'App\\Repository\\CoachRepository', 'getCoachRepositoryService', true],
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'coachRepository' => 'App\\Repository\\CoachRepository',
            'serializerInterface' => '?',
        ]);
    }
}
