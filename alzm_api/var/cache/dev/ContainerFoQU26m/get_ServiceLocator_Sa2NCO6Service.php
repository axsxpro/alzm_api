<?php

namespace ContainerFoQU26m;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Sa2NCO6Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.sa2NCO6' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.sa2NCO6'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'availabilityRepository' => ['privates', 'App\\Repository\\AvailabilityRepository', 'getAvailabilityRepositoryService', true],
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'availabilityRepository' => 'App\\Repository\\AvailabilityRepository',
            'serializerInterface' => '?',
        ]);
    }
}
