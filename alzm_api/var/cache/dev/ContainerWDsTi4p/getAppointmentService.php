<?php

namespace ContainerWDsTi4p;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAppointmentService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Entity\Appointment' shared autowired service.
     *
     * @return \App\Entity\Appointment
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Entity/Appointment.php';

        return $container->privates['App\\Entity\\Appointment'] = new \App\Entity\Appointment();
    }
}