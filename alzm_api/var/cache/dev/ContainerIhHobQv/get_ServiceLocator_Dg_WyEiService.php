<?php

namespace ContainerIhHobQv;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Dg_WyEiService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.dg.WyEi' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.dg.WyEi'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\AdminController::allAdmin' => ['privates', '.service_locator.fmKhUTq', 'get_ServiceLocator_FmKhUTqService', true],
            'App\\Controller\\AdvantagesController::allAdvantages' => ['privates', '.service_locator.209vKPp', 'get_ServiceLocator_209vKPpService', true],
            'App\\Controller\\AppointmentController::allAppointment' => ['privates', '.service_locator.k8niE_K', 'get_ServiceLocator_K8niEKService', true],
            'App\\Controller\\AppointmentController::appointmentByCoachId' => ['privates', '.service_locator.k8niE_K', 'get_ServiceLocator_K8niEKService', true],
            'App\\Controller\\AppointmentController::createUsers' => ['privates', '.service_locator.0G9cN2b', 'get_ServiceLocator_0G9cN2bService', true],
            'App\\Controller\\AppointmentController::deleteAppointment' => ['privates', '.service_locator.Ai6hlnu', 'get_ServiceLocator_Ai6hlnuService', true],
            'App\\Controller\\AvailabilityController::allAvailabilities' => ['privates', '.service_locator.sa2NCO6', 'get_ServiceLocator_Sa2NCO6Service', true],
            'App\\Controller\\AvailabilityController::availabilitiesByCoachId' => ['privates', '.service_locator.sa2NCO6', 'get_ServiceLocator_Sa2NCO6Service', true],
            'App\\Controller\\AvailabilityController::createUsers' => ['privates', '.service_locator.xQRnlgm', 'get_ServiceLocator_XQRnlgmService', true],
            'App\\Controller\\AvailabilityController::deleteAvailability' => ['privates', '.service_locator.jhKxWWc', 'get_ServiceLocator_JhKxWWcService', true],
            'App\\Controller\\AvailabilityController::updateAvailabilities' => ['privates', '.service_locator.f8xil.J', 'get_ServiceLocator_F8xil_JService', true],
            'App\\Controller\\CoachController::allCoach' => ['privates', '.service_locator.NWz6gvW', 'get_ServiceLocator_NWz6gvWService', true],
            'App\\Controller\\CoachController::deleteCoach' => ['privates', '.service_locator.bRtUlSQ', 'get_ServiceLocator_BRtUlSQService', true],
            'App\\Controller\\CoachController::getallPatients' => ['privates', '.service_locator.54rra3g', 'get_ServiceLocator_54rra3gService', true],
            'App\\Controller\\CourseController::allCourse' => ['privates', '.service_locator.J2Qh6MH', 'get_ServiceLocator_J2Qh6MHService', true],
            'App\\Controller\\PatientController::allPatient' => ['privates', '.service_locator.lVJkG_9', 'get_ServiceLocator_LVJkG9Service', true],
            'App\\Controller\\PatientController::deletePatient' => ['privates', '.service_locator.lDNiEmG', 'get_ServiceLocator_LDNiEmGService', true],
            'App\\Controller\\PatientController::getallPatients' => ['privates', '.service_locator.o.RTbA2', 'get_ServiceLocator_O_RTbA2Service', true],
            'App\\Controller\\PlanController::allPlan' => ['privates', '.service_locator.5ZCwxsA', 'get_ServiceLocator_5ZCwxsAService', true],
            'App\\Controller\\PlanningRulesController::allPlan' => ['privates', '.service_locator.XWu.50g', 'get_ServiceLocator_XWu_50gService', true],
            'App\\Controller\\PlanningRulesController::createUsers' => ['privates', '.service_locator.xQRnlgm', 'get_ServiceLocator_XQRnlgmService', true],
            'App\\Controller\\PlanningRulesController::getPlanningById' => ['privates', '.service_locator.3YgwsAp', 'get_ServiceLocator_3YgwsApService', true],
            'App\\Controller\\TransactionController::allTransaction' => ['privates', '.service_locator.v57OW1I', 'get_ServiceLocator_V57OW1IService', true],
            'App\\Controller\\UsersController::createUsers' => ['privates', '.service_locator.MpaYdub', 'get_ServiceLocator_MpaYdubService', true],
            'App\\Controller\\UsersController::deleteUser' => ['privates', '.service_locator.Sj2uvAJ', 'get_ServiceLocator_Sj2uvAJService', true],
            'App\\Controller\\UsersController::getRoleById' => ['privates', '.service_locator.wYIawp6', 'get_ServiceLocator_WYIawp6Service', true],
            'App\\Controller\\UsersController::getUserById' => ['privates', '.service_locator.E2DLjxp', 'get_ServiceLocator_E2DLjxpService', true],
            'App\\Controller\\UsersController::getUsers' => ['privates', '.service_locator.5AgJos5', 'get_ServiceLocator_5AgJos5Service', true],
            'App\\Controller\\UsersController::updateUsers' => ['privates', '.service_locator.h5Zosne', 'get_ServiceLocator_H5ZosneService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Controller\\AdminController:allAdmin' => ['privates', '.service_locator.fmKhUTq', 'get_ServiceLocator_FmKhUTqService', true],
            'App\\Controller\\AdvantagesController:allAdvantages' => ['privates', '.service_locator.209vKPp', 'get_ServiceLocator_209vKPpService', true],
            'App\\Controller\\AppointmentController:allAppointment' => ['privates', '.service_locator.k8niE_K', 'get_ServiceLocator_K8niEKService', true],
            'App\\Controller\\AppointmentController:appointmentByCoachId' => ['privates', '.service_locator.k8niE_K', 'get_ServiceLocator_K8niEKService', true],
            'App\\Controller\\AppointmentController:createUsers' => ['privates', '.service_locator.0G9cN2b', 'get_ServiceLocator_0G9cN2bService', true],
            'App\\Controller\\AppointmentController:deleteAppointment' => ['privates', '.service_locator.Ai6hlnu', 'get_ServiceLocator_Ai6hlnuService', true],
            'App\\Controller\\AvailabilityController:allAvailabilities' => ['privates', '.service_locator.sa2NCO6', 'get_ServiceLocator_Sa2NCO6Service', true],
            'App\\Controller\\AvailabilityController:availabilitiesByCoachId' => ['privates', '.service_locator.sa2NCO6', 'get_ServiceLocator_Sa2NCO6Service', true],
            'App\\Controller\\AvailabilityController:createUsers' => ['privates', '.service_locator.xQRnlgm', 'get_ServiceLocator_XQRnlgmService', true],
            'App\\Controller\\AvailabilityController:deleteAvailability' => ['privates', '.service_locator.jhKxWWc', 'get_ServiceLocator_JhKxWWcService', true],
            'App\\Controller\\AvailabilityController:updateAvailabilities' => ['privates', '.service_locator.f8xil.J', 'get_ServiceLocator_F8xil_JService', true],
            'App\\Controller\\CoachController:allCoach' => ['privates', '.service_locator.NWz6gvW', 'get_ServiceLocator_NWz6gvWService', true],
            'App\\Controller\\CoachController:deleteCoach' => ['privates', '.service_locator.bRtUlSQ', 'get_ServiceLocator_BRtUlSQService', true],
            'App\\Controller\\CoachController:getallPatients' => ['privates', '.service_locator.54rra3g', 'get_ServiceLocator_54rra3gService', true],
            'App\\Controller\\CourseController:allCourse' => ['privates', '.service_locator.J2Qh6MH', 'get_ServiceLocator_J2Qh6MHService', true],
            'App\\Controller\\PatientController:allPatient' => ['privates', '.service_locator.lVJkG_9', 'get_ServiceLocator_LVJkG9Service', true],
            'App\\Controller\\PatientController:deletePatient' => ['privates', '.service_locator.lDNiEmG', 'get_ServiceLocator_LDNiEmGService', true],
            'App\\Controller\\PatientController:getallPatients' => ['privates', '.service_locator.o.RTbA2', 'get_ServiceLocator_O_RTbA2Service', true],
            'App\\Controller\\PlanController:allPlan' => ['privates', '.service_locator.5ZCwxsA', 'get_ServiceLocator_5ZCwxsAService', true],
            'App\\Controller\\PlanningRulesController:allPlan' => ['privates', '.service_locator.XWu.50g', 'get_ServiceLocator_XWu_50gService', true],
            'App\\Controller\\PlanningRulesController:createUsers' => ['privates', '.service_locator.xQRnlgm', 'get_ServiceLocator_XQRnlgmService', true],
            'App\\Controller\\PlanningRulesController:getPlanningById' => ['privates', '.service_locator.3YgwsAp', 'get_ServiceLocator_3YgwsApService', true],
            'App\\Controller\\TransactionController:allTransaction' => ['privates', '.service_locator.v57OW1I', 'get_ServiceLocator_V57OW1IService', true],
            'App\\Controller\\UsersController:createUsers' => ['privates', '.service_locator.MpaYdub', 'get_ServiceLocator_MpaYdubService', true],
            'App\\Controller\\UsersController:deleteUser' => ['privates', '.service_locator.Sj2uvAJ', 'get_ServiceLocator_Sj2uvAJService', true],
            'App\\Controller\\UsersController:getRoleById' => ['privates', '.service_locator.wYIawp6', 'get_ServiceLocator_WYIawp6Service', true],
            'App\\Controller\\UsersController:getUserById' => ['privates', '.service_locator.E2DLjxp', 'get_ServiceLocator_E2DLjxpService', true],
            'App\\Controller\\UsersController:getUsers' => ['privates', '.service_locator.5AgJos5', 'get_ServiceLocator_5AgJos5Service', true],
            'App\\Controller\\UsersController:updateUsers' => ['privates', '.service_locator.h5Zosne', 'get_ServiceLocator_H5ZosneService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
        ], [
            'App\\Controller\\AdminController::allAdmin' => '?',
            'App\\Controller\\AdvantagesController::allAdvantages' => '?',
            'App\\Controller\\AppointmentController::allAppointment' => '?',
            'App\\Controller\\AppointmentController::appointmentByCoachId' => '?',
            'App\\Controller\\AppointmentController::createUsers' => '?',
            'App\\Controller\\AppointmentController::deleteAppointment' => '?',
            'App\\Controller\\AvailabilityController::allAvailabilities' => '?',
            'App\\Controller\\AvailabilityController::availabilitiesByCoachId' => '?',
            'App\\Controller\\AvailabilityController::createUsers' => '?',
            'App\\Controller\\AvailabilityController::deleteAvailability' => '?',
            'App\\Controller\\AvailabilityController::updateAvailabilities' => '?',
            'App\\Controller\\CoachController::allCoach' => '?',
            'App\\Controller\\CoachController::deleteCoach' => '?',
            'App\\Controller\\CoachController::getallPatients' => '?',
            'App\\Controller\\CourseController::allCourse' => '?',
            'App\\Controller\\PatientController::allPatient' => '?',
            'App\\Controller\\PatientController::deletePatient' => '?',
            'App\\Controller\\PatientController::getallPatients' => '?',
            'App\\Controller\\PlanController::allPlan' => '?',
            'App\\Controller\\PlanningRulesController::allPlan' => '?',
            'App\\Controller\\PlanningRulesController::createUsers' => '?',
            'App\\Controller\\PlanningRulesController::getPlanningById' => '?',
            'App\\Controller\\TransactionController::allTransaction' => '?',
            'App\\Controller\\UsersController::createUsers' => '?',
            'App\\Controller\\UsersController::deleteUser' => '?',
            'App\\Controller\\UsersController::getRoleById' => '?',
            'App\\Controller\\UsersController::getUserById' => '?',
            'App\\Controller\\UsersController::getUsers' => '?',
            'App\\Controller\\UsersController::updateUsers' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\AdminController:allAdmin' => '?',
            'App\\Controller\\AdvantagesController:allAdvantages' => '?',
            'App\\Controller\\AppointmentController:allAppointment' => '?',
            'App\\Controller\\AppointmentController:appointmentByCoachId' => '?',
            'App\\Controller\\AppointmentController:createUsers' => '?',
            'App\\Controller\\AppointmentController:deleteAppointment' => '?',
            'App\\Controller\\AvailabilityController:allAvailabilities' => '?',
            'App\\Controller\\AvailabilityController:availabilitiesByCoachId' => '?',
            'App\\Controller\\AvailabilityController:createUsers' => '?',
            'App\\Controller\\AvailabilityController:deleteAvailability' => '?',
            'App\\Controller\\AvailabilityController:updateAvailabilities' => '?',
            'App\\Controller\\CoachController:allCoach' => '?',
            'App\\Controller\\CoachController:deleteCoach' => '?',
            'App\\Controller\\CoachController:getallPatients' => '?',
            'App\\Controller\\CourseController:allCourse' => '?',
            'App\\Controller\\PatientController:allPatient' => '?',
            'App\\Controller\\PatientController:deletePatient' => '?',
            'App\\Controller\\PatientController:getallPatients' => '?',
            'App\\Controller\\PlanController:allPlan' => '?',
            'App\\Controller\\PlanningRulesController:allPlan' => '?',
            'App\\Controller\\PlanningRulesController:createUsers' => '?',
            'App\\Controller\\PlanningRulesController:getPlanningById' => '?',
            'App\\Controller\\TransactionController:allTransaction' => '?',
            'App\\Controller\\UsersController:createUsers' => '?',
            'App\\Controller\\UsersController:deleteUser' => '?',
            'App\\Controller\\UsersController:getRoleById' => '?',
            'App\\Controller\\UsersController:getUserById' => '?',
            'App\\Controller\\UsersController:getUsers' => '?',
            'App\\Controller\\UsersController:updateUsers' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
