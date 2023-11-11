<?php

namespace ContainerMr5OVEj;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_H5ZosneService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.h5Zosne' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.h5Zosne'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'appUser' => ['privates', 'App\\Entity\\AppUser', 'getAppUserService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'serializer' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
            'userPasswordHasherInterface' => ['privates', 'security.user_password_hasher', 'getSecurity_UserPasswordHasherService', true],
        ], [
            'appUser' => 'App\\Entity\\AppUser',
            'entityManager' => '?',
            'serializer' => '?',
            'userPasswordHasherInterface' => '?',
        ]);
    }
}
