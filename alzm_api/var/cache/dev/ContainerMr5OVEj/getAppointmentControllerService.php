<?php

namespace ContainerMr5OVEj;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAppointmentControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\AppointmentController' shared autowired service.
     *
     * @return \App\Controller\AppointmentController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/AppointmentController.php';

        $container->services['App\\Controller\\AppointmentController'] = $instance = new \App\Controller\AppointmentController();

        $instance->setContainer(($container->privates['.service_locator.mx0UMmY'] ?? $container->load('get_ServiceLocator_Mx0UMmYService'))->withContext('App\\Controller\\AppointmentController', $container));

        return $instance;
    }
}
