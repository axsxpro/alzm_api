<?php

namespace ContainerWDsTi4p;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_J2Qh6MHService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.J2Qh6MH' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.J2Qh6MH'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'courseRepository' => ['privates', 'App\\Repository\\CourseRepository', 'getCourseRepositoryService', true],
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'courseRepository' => 'App\\Repository\\CourseRepository',
            'serializerInterface' => '?',
        ]);
    }
}
