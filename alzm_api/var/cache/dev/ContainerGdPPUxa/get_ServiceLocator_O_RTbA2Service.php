<?php

namespace ContainerGdPPUxa;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_O_RTbA2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.o.RTbA2' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.o.RTbA2'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'patient' => ['privates', 'App\\Entity\\Patient', 'getPatientService', true],
            'serializer' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'patient' => 'App\\Entity\\Patient',
            'serializer' => '?',
        ]);
    }
}
