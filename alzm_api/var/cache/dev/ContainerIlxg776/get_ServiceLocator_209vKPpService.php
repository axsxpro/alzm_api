<?php

namespace ContainerIlxg776;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_209vKPpService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.209vKPp' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.209vKPp'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'advantageRepository' => ['privates', 'App\\Repository\\AdvantageRepository', 'getAdvantageRepositoryService', true],
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'advantageRepository' => 'App\\Repository\\AdvantageRepository',
            'serializerInterface' => '?',
        ]);
    }
}
