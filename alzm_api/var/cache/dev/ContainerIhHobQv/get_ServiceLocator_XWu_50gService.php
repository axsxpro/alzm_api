<?php

namespace ContainerIhHobQv;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_XWu_50gService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.XWu.50g' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.XWu.50g'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'planningRulesRepository' => ['privates', 'App\\Repository\\PlanningRulesRepository', 'getPlanningRulesRepositoryService', true],
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
        ], [
            'planningRulesRepository' => 'App\\Repository\\PlanningRulesRepository',
            'serializerInterface' => '?',
        ]);
    }
}