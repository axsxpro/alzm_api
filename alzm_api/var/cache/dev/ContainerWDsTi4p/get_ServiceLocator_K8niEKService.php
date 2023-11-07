<?php

namespace ContainerWDsTi4p;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_K8niEKService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.k8niE_K' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.k8niE_K'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'appointmentRepository' => ['privates', 'App\\Repository\\AppointmentRepository', 'getAppointmentRepositoryService', true],
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'appointmentRepository' => 'App\\Repository\\AppointmentRepository',
            'serializerInterface' => '?',
        ]);
    }
}
