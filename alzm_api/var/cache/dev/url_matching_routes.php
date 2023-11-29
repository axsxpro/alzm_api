<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/doc.json' => [[['_route' => 'app.swagger', '_controller' => 'nelmio_api_doc.controller.swagger'], null, ['GET' => 0], null, false, false, null]],
        '/api/doc' => [[['_route' => 'app.swagger_ui', '_controller' => 'nelmio_api_doc.controller.swagger_ui'], null, ['GET' => 0], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::allAdmin'], null, ['GET' => 0], null, false, false, null]],
        '/advantages/all' => [[['_route' => 'app_all_advantages', '_controller' => 'App\\Controller\\AdvantagesController::allAdvantages'], null, null, null, false, false, null]],
        '/api/appointments' => [[['_route' => 'app_appointments', '_controller' => 'App\\Controller\\AppointmentController::getAppointments'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/appointments' => [[['_route' => 'app_appointments_post', '_controller' => 'App\\Controller\\AppointmentController::createAppointment'], null, ['POST' => 0], null, false, false, null]],
        '/api/availabilities' => [[['_route' => 'app_availabilities', '_controller' => 'App\\Controller\\AvailabilityController::getAvailabilities'], null, ['GET' => 0], null, false, false, null]],
        '/api/coaches' => [[['_route' => 'app_all_coach', '_controller' => 'App\\Controller\\CoachController::getCoachs'], null, ['GET' => 0], null, false, false, null]],
        '/api/courses' => [[['_route' => 'app_courses', '_controller' => 'App\\Controller\\CourseController::getCourses'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/courses' => [[['_route' => 'app_courses_post', '_controller' => 'App\\Controller\\CourseController::createCourses'], null, ['POST' => 0], null, false, false, null]],
        '/home' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomePageController::index'], null, null, null, false, false, null]],
        '/api/patients' => [[['_route' => 'app_all_patient', '_controller' => 'App\\Controller\\PatientController::getPatients'], null, ['GET' => 0], null, false, false, null]],
        '/api/plans' => [[['_route' => 'app_plans', '_controller' => 'App\\Controller\\PlanController::getPlans'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/plans' => [[['_route' => 'app_plans_post', '_controller' => 'App\\Controller\\PlanController::createPlans'], null, ['POST' => 0], null, false, false, null]],
        '/api/plannings' => [[['_route' => 'app_planning_rules', '_controller' => 'App\\Controller\\PlanningRulesController::getPlanningsRules'], null, ['GET' => 0], null, false, false, null]],
        '/api/schedules' => [[['_route' => 'app_schedules', '_controller' => 'App\\Controller\\ScheduleController::getSchedules'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/schedules' => [[['_route' => 'app_schedules_post', '_controller' => 'App\\Controller\\ScheduleController::createCourses'], null, ['POST' => 0], null, false, false, null]],
        '/api/transactions' => [[['_route' => 'app_transactions', '_controller' => 'App\\Controller\\TransactionController::getTransactions'], null, ['GET' => 0], null, false, false, null]],
        '/api/users' => [[['_route' => 'app_users', '_controller' => 'App\\Controller\\UsersController::getUsers'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/users' => [[['_route' => 'app_users_post', '_controller' => 'App\\Controller\\UsersController::createUsers'], null, ['POST' => 0], null, false, false, null]],
        '/api/login_check' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api/(?'
                    .'|p(?'
                        .'|ut/(?'
                            .'|co(?'
                                .'|achs/([^/]++)/(?'
                                    .'|a(?'
                                        .'|ppointments/([^/]++)(*:233)'
                                        .'|vailabilities/([^/]++)(*:263)'
                                    .')'
                                    .'|plannings/([^/]++)(*:290)'
                                .')'
                                .'|urses/([^/]++)(*:313)'
                            .')'
                            .'|plans/([^/]++)(*:336)'
                            .'|schedules/([^/]++)(*:362)'
                            .'|users/([^/]++)(*:384)'
                        .')'
                        .'|ost/coachs/([^/]++)/(?'
                            .'|availabilities(*:430)'
                            .'|plannings(*:447)'
                        .')'
                        .'|atients/([^/]++)(*:472)'
                        .'|lan(?'
                            .'|s/([^/]++)(*:496)'
                            .'|nings/([^/]++)(*:518)'
                        .')'
                    .')'
                    .'|co(?'
                        .'|ach(?'
                            .'|s/([^/]++)/a(?'
                                .'|ppointments(*:565)'
                                .'|vailabilities(*:586)'
                            .')'
                            .'|es/([^/]++)(*:606)'
                        .')'
                        .'|urses/([^/]++)(*:629)'
                    .')'
                    .'|delete/(?'
                        .'|co(?'
                            .'|ach(?'
                                .'|s/([^/]++)/(?'
                                    .'|a(?'
                                        .'|ppointments/([^/]++)(*:697)'
                                        .'|vailabilities/([^/]++)(*:727)'
                                    .')'
                                    .'|plannings/([^/]++)(*:754)'
                                .')'
                                .'|es/([^/]++)(*:774)'
                            .')'
                            .'|urses/([^/]++)(*:797)'
                        .')'
                        .'|a(?'
                            .'|ppointments/([^/]++)(*:830)'
                            .'|vailabilities/([^/]++)(*:860)'
                        .')'
                        .'|p(?'
                            .'|atients/([^/]++)(*:889)'
                            .'|lans/([^/]++)(*:910)'
                        .')'
                        .'|schedules/([^/]++)(*:937)'
                    .')'
                    .'|schedules/([^/]++)(*:964)'
                    .'|users/([^/]++)(?'
                        .'|(*:989)'
                        .'|/(?'
                            .'|roles(*:1006)'
                            .'|delete(*:1021)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        233 => [[['_route' => 'app_appointments_put', '_controller' => 'App\\Controller\\AppointmentController::updateAppointment'], ['id', 'idAppointment'], ['PUT' => 0], null, false, true, null]],
        263 => [[['_route' => 'app_availabilities_put', '_controller' => 'App\\Controller\\AvailabilityController::updateAvailabilities'], ['id', 'idAvailability'], ['PUT' => 0], null, false, true, null]],
        290 => [[['_route' => 'app_plannings_put', '_controller' => 'App\\Controller\\PlanningRulesController::updatePlannings'], ['id', 'idPlanning'], ['PUT' => 0], null, false, true, null]],
        313 => [[['_route' => 'app_courses_put', '_controller' => 'App\\Controller\\CourseController::updateCourses'], ['id'], ['PUT' => 0], null, false, true, null]],
        336 => [[['_route' => 'app_plans_put', '_controller' => 'App\\Controller\\PlanController::updatePlans'], ['id'], ['PUT' => 0], null, false, true, null]],
        362 => [[['_route' => 'app_schedules_put', '_controller' => 'App\\Controller\\ScheduleController::updateCourses'], ['id'], ['PUT' => 0], null, false, true, null]],
        384 => [[['_route' => 'app_users_put', '_controller' => 'App\\Controller\\UsersController::updateUsers'], ['id'], ['PUT' => 0], null, false, true, null]],
        430 => [[['_route' => 'app_availabilities_post', '_controller' => 'App\\Controller\\AvailabilityController::createAvailabilities'], ['id'], ['POST' => 0], null, false, false, null]],
        447 => [[['_route' => 'app_plannings_post', '_controller' => 'App\\Controller\\PlanningRulesController::createPlannings'], ['id'], ['POST' => 0], null, false, false, null]],
        472 => [[['_route' => 'patient_id', '_controller' => 'App\\Controller\\PatientController::getPatientById'], ['id'], ['GET' => 0], null, false, true, null]],
        496 => [[['_route' => 'plans_id', '_controller' => 'App\\Controller\\PlanController::getPlanById'], ['id'], ['GET' => 0], null, false, true, null]],
        518 => [[['_route' => 'planning_id', '_controller' => 'App\\Controller\\PlanningRulesController::getPlanningById'], ['id'], ['GET' => 0], null, false, true, null]],
        565 => [[['_route' => 'app_coach_appointment', '_controller' => 'App\\Controller\\AppointmentController::getAppointmentByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        586 => [[['_route' => 'app_coach_availabilities', '_controller' => 'App\\Controller\\AvailabilityController::getAvailabilitiesByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        606 => [[['_route' => 'coach_id', '_controller' => 'App\\Controller\\CoachController::getCoachById'], ['id'], ['GET' => 0], null, false, true, null]],
        629 => [[['_route' => 'app_courses_id', '_controller' => 'App\\Controller\\CourseController::getCoursesbyId'], ['id'], ['GET' => 0], null, false, true, null]],
        697 => [[['_route' => 'app_appointments_delete', '_controller' => 'App\\Controller\\AppointmentController::deleteAppointments'], ['id', 'idAppointment'], ['DELETE' => 0], null, false, true, null]],
        727 => [[['_route' => 'app_availabilities_delete', '_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilities'], ['id', 'idAvailability'], ['DELETE' => 0], null, false, true, null]],
        754 => [[['_route' => 'delete_plannings', '_controller' => 'App\\Controller\\PlanningRulesController::deletePlannings'], ['id', 'idPlanning'], ['DELETE' => 0], null, false, true, null]],
        774 => [[['_route' => 'app_delete_coach', '_controller' => 'App\\Controller\\CoachController::deleteCoach'], ['id'], ['DELETE' => 0], null, true, true, null]],
        797 => [[['_route' => 'delete_courses', '_controller' => 'App\\Controller\\CourseController::deleteCourses'], ['id'], ['DELETE' => 0], null, false, true, null]],
        830 => [[['_route' => 'delete_appointment', '_controller' => 'App\\Controller\\AppointmentController::deleteAppointment'], ['id'], ['DELETE' => 0], null, false, true, null]],
        860 => [[['_route' => 'delete_availability_id', '_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilityById'], ['id'], ['DELETE' => 0], null, false, true, null]],
        889 => [[['_route' => 'app_delete_patient', '_controller' => 'App\\Controller\\PatientController::deletePatient'], ['id'], ['DELETE' => 0], null, false, true, null]],
        910 => [[['_route' => 'delete_plans', '_controller' => 'App\\Controller\\PlanController::deleteCourses'], ['id'], ['DELETE' => 0], null, false, true, null]],
        937 => [[['_route' => 'delete_schedules', '_controller' => 'App\\Controller\\ScheduleController::deleteCourses'], ['id'], ['DELETE' => 0], null, false, true, null]],
        964 => [[['_route' => 'schedule_id', '_controller' => 'App\\Controller\\ScheduleController::getScheduleById'], ['id'], ['GET' => 0], null, false, true, null]],
        989 => [[['_route' => 'users_id', '_controller' => 'App\\Controller\\UsersController::getUserById'], ['id'], ['GET' => 0], null, false, true, null]],
        1006 => [[['_route' => 'users_id_roles', '_controller' => 'App\\Controller\\UsersController::getRoleById'], ['id'], ['GET' => 0], null, false, false, null]],
        1021 => [
            [['_route' => 'app_users_delete', '_controller' => 'App\\Controller\\UsersController::deleteUser'], ['id'], ['DELETE' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
