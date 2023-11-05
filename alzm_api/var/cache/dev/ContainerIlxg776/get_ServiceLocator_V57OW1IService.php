<?php

namespace ContainerIlxg776;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_V57OW1IService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.v57OW1I' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.v57OW1I'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'serializerInterface' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
            'transactionRepository' => ['privates', 'App\\Repository\\TransactionRepository', 'getTransactionRepositoryService', true],
        ], [
            'serializerInterface' => '?',
            'transactionRepository' => 'App\\Repository\\TransactionRepository',
        ]);
    }
}
