<?php

namespace ContainerKbOviLX;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Sj2uvAJService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Sj2uvAJ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Sj2uvAJ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'appUser' => ['privates', 'App\\Entity\\AppUser', 'getAppUserService', true],
            'appointmentRepository' => ['privates', 'App\\Repository\\AppointmentRepository', 'getAppointmentRepositoryService', true],
            'availabilityRepository' => ['privates', 'App\\Repository\\AvailabilityRepository', 'getAvailabilityRepositoryService', true],
            'coachRepository' => ['privates', 'App\\Repository\\CoachRepository', 'getCoachRepositoryService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'patientRepository' => ['privates', 'App\\Repository\\PatientRepository', 'getPatientRepositoryService', true],
            'planningRulesRepository' => ['privates', 'App\\Repository\\PlanningRulesRepository', 'getPlanningRulesRepositoryService', true],
            'transactionRepository' => ['privates', 'App\\Repository\\TransactionRepository', 'getTransactionRepositoryService', true],
        ], [
            'appUser' => 'App\\Entity\\AppUser',
            'appointmentRepository' => 'App\\Repository\\AppointmentRepository',
            'availabilityRepository' => 'App\\Repository\\AvailabilityRepository',
            'coachRepository' => 'App\\Repository\\CoachRepository',
            'entityManager' => '?',
            'patientRepository' => 'App\\Repository\\PatientRepository',
            'planningRulesRepository' => 'App\\Repository\\PlanningRulesRepository',
            'transactionRepository' => 'App\\Repository\\TransactionRepository',
        ]);
    }
}
