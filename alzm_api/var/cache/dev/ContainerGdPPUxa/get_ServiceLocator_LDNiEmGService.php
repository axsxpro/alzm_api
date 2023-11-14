<?php

namespace ContainerGdPPUxa;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_LDNiEmGService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.lDNiEmG' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.lDNiEmG'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'appUser' => ['privates', 'App\\Entity\\AppUser', 'getAppUserService', true],
            'appointmentRepository' => ['privates', 'App\\Repository\\AppointmentRepository', 'getAppointmentRepositoryService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'patientRepository' => ['privates', 'App\\Repository\\PatientRepository', 'getPatientRepositoryService', true],
            'transactionRepository' => ['privates', 'App\\Repository\\TransactionRepository', 'getTransactionRepositoryService', true],
        ], [
            'appUser' => 'App\\Entity\\AppUser',
            'appointmentRepository' => 'App\\Repository\\AppointmentRepository',
            'entityManager' => '?',
            'patientRepository' => 'App\\Repository\\PatientRepository',
            'transactionRepository' => 'App\\Repository\\TransactionRepository',
        ]);
    }
}
