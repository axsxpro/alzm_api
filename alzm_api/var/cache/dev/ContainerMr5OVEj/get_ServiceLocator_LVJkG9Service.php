<?php

namespace ContainerMr5OVEj;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_LVJkG9Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.lVJkG_9' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.lVJkG_9'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'patientRepository' => ['privates', 'App\\Repository\\PatientRepository', 'getPatientRepositoryService', true],
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'patientRepository' => 'App\\Repository\\PatientRepository',
            'serializerInterface' => '?',
        ]);
    }
}
