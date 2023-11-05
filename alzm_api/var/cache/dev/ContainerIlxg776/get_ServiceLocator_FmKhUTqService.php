<?php

namespace ContainerIlxg776;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_FmKhUTqService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.fmKhUTq' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.fmKhUTq'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'adminRepository' => ['privates', 'App\\Repository\\AdminRepository', 'getAdminRepositoryService', true],
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'adminRepository' => 'App\\Repository\\AdminRepository',
            'serializerInterface' => '?',
        ]);
    }
}
