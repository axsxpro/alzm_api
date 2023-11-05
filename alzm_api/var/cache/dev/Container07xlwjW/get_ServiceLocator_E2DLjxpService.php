<?php

namespace Container07xlwjW;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_E2DLjxpService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.E2DLjxp' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.E2DLjxp'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'appUser' => ['privates', 'App\\Entity\\AppUser', 'getAppUserService', true],
            'serializer' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'appUser' => 'App\\Entity\\AppUser',
            'serializer' => '?',
        ]);
    }
}
