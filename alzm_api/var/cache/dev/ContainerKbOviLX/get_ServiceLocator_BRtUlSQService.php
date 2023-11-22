<?php

namespace ContainerKbOviLX;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_BRtUlSQService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.bRtUlSQ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.bRtUlSQ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'appUser' => ['privates', 'App\\Entity\\AppUser', 'getAppUserService', true],
            'appointmentRepository' => ['privates', 'App\\Repository\\AppointmentRepository', 'getAppointmentRepositoryService', true],
            'availabilityRepository' => ['privates', 'App\\Repository\\AvailabilityRepository', 'getAvailabilityRepositoryService', true],
            'coach' => ['privates', 'App\\Entity\\Coach', 'getCoachService', true],
            'coachRepository' => ['privates', 'App\\Repository\\CoachRepository', 'getCoachRepositoryService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'planningRulesRepository' => ['privates', 'App\\Repository\\PlanningRulesRepository', 'getPlanningRulesRepositoryService', true],
        ], [
            'appUser' => 'App\\Entity\\AppUser',
            'appointmentRepository' => 'App\\Repository\\AppointmentRepository',
            'availabilityRepository' => 'App\\Repository\\AvailabilityRepository',
            'coach' => 'App\\Entity\\Coach',
            'coachRepository' => 'App\\Repository\\CoachRepository',
            'entityManager' => '?',
            'planningRulesRepository' => 'App\\Repository\\PlanningRulesRepository',
        ]);
    }
}
