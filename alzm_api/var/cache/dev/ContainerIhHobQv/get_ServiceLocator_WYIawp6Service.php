<?php

namespace ContainerIhHobQv;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_WYIawp6Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.wYIawp6' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.wYIawp6'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'appUserRepository' => ['privates', 'App\\Repository\\AppUserRepository', 'getAppUserRepositoryService', true],
            'serializer' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'appUserRepository' => 'App\\Repository\\AppUserRepository',
            'serializer' => '?',
        ]);
    }
}