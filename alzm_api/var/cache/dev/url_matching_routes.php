<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/all' => [[['_route' => 'app_all_admin', '_controller' => 'App\\Controller\\AdminController::allAdmin'], null, ['GET' => 0], null, false, false, null]],
        '/advantages/all' => [[['_route' => 'app_all_advantages', '_controller' => 'App\\Controller\\AdvantagesController::allAdvantages'], null, null, null, false, false, null]],
        '/appointments' => [[['_route' => 'app_all_appointments', '_controller' => 'App\\Controller\\AppointmentController::allAppointment'], null, ['GET' => 0], null, false, false, null]],
        '/post/appointments' => [[['_route' => 'app_appointments_post', '_controller' => 'App\\Controller\\AppointmentController::createUsers'], null, ['POST' => 0], null, false, false, null]],
        '/availabilities' => [[['_route' => 'app_availabilities', '_controller' => 'App\\Controller\\AvailabilityController::allAvailabilities'], null, null, null, false, false, null]],
        '/coachs' => [[['_route' => 'app_all_coach', '_controller' => 'App\\Controller\\CoachController::allCoach'], null, null, null, false, false, null]],
        '/course/all' => [[['_route' => 'app_all_course', '_controller' => 'App\\Controller\\CourseController::allCourse'], null, null, null, false, false, null]],
        '/home' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomePageController::index'], null, null, null, false, false, null]],
        '/patients' => [[['_route' => 'app_all_patient', '_controller' => 'App\\Controller\\PatientController::allPatient'], null, null, null, false, false, null]],
        '/plan/all' => [[['_route' => 'app_all_plan', '_controller' => 'App\\Controller\\PlanController::allPlan'], null, null, null, false, false, null]],
        '/planningrules' => [[['_route' => 'app_all_planning_rules', '_controller' => 'App\\Controller\\PlanningRulesController::allPlan'], null, null, null, false, false, null]],
        '/transaction/all' => [[['_route' => 'app_all_transaction', '_controller' => 'App\\Controller\\TransactionController::allTransaction'], null, null, null, false, false, null]],
        '/users' => [[['_route' => 'app_users', '_controller' => 'App\\Controller\\UsersController::getUsers'], null, ['GET' => 0], null, false, false, null]],
        '/post/users' => [[['_route' => 'app_users_post', '_controller' => 'App\\Controller\\UsersController::createUsers'], null, ['POST' => 0], null, false, false, null]],
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
                .'|/coachs/([^/]++)/a(?'
                    .'|ppointments(*:201)'
                    .'|vailabilities(*:222)'
                .')'
                .'|/appointments/([^/]++)(*:253)'
                .'|/p(?'
                    .'|ost/coachs/([^/]++)/(?'
                        .'|availabilities(*:303)'
                        .'|plannings\\-rules(*:327)'
                    .')'
                    .'|ut/(?'
                        .'|coachs/([^/]++)/availabilities/([^/]++)(*:381)'
                        .'|users/([^/]++)(*:403)'
                    .')'
                    .'|atients/([^/]++)(*:428)'
                    .'|lanningrules/([^/]++)(*:457)'
                .')'
                .'|/delete/(?'
                    .'|coachs/([^/]++)(?'
                        .'|/availabilities/([^/]++)(*:519)'
                        .'|(*:527)'
                    .')'
                    .'|patients/([^/]++)(*:553)'
                .')'
                .'|/users/([^/]++)(?'
                    .'|(*:580)'
                    .'|/(?'
                        .'|roles(*:597)'
                        .'|delete(*:611)'
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
        201 => [[['_route' => 'app_coach_appointment', '_controller' => 'App\\Controller\\AppointmentController::appointmentByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        222 => [[['_route' => 'app_coach_availabilities', '_controller' => 'App\\Controller\\AvailabilityController::availabilitiesByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        253 => [[['_route' => 'delete_appointment', '_controller' => 'App\\Controller\\AppointmentController::deleteAppointment'], ['id'], ['DELETE' => 0], null, false, true, null]],
        303 => [[['_route' => 'app_availabilities_post', '_controller' => 'App\\Controller\\AvailabilityController::createUsers'], ['id'], ['POST' => 0], null, false, false, null]],
        327 => [[['_route' => 'app_plannings_post', '_controller' => 'App\\Controller\\PlanningRulesController::createUsers'], ['id'], ['POST' => 0], null, false, false, null]],
        381 => [[['_route' => 'app_availabilities_put', '_controller' => 'App\\Controller\\AvailabilityController::updateAvailabilities'], ['id', 'idAvailability'], ['PUT' => 0], null, false, true, null]],
        403 => [[['_route' => 'app_users_put', '_controller' => 'App\\Controller\\UsersController::updateUsers'], ['id'], ['PUT' => 0], null, false, true, null]],
        428 => [[['_route' => 'patient_id', '_controller' => 'App\\Controller\\PatientController::getallPatients'], ['id'], ['GET' => 0], null, false, true, null]],
        457 => [[['_route' => 'planning_id', '_controller' => 'App\\Controller\\PlanningRulesController::getPlanningById'], ['id'], ['GET' => 0], null, false, true, null]],
        519 => [[['_route' => 'delete_availabilities', '_controller' => 'App\\Controller\\AvailabilityController::deleteAvailability'], ['id', 'idAvailability'], ['DELETE' => 0], null, false, true, null]],
        527 => [[['_route' => 'app_delete_coach', '_controller' => 'App\\Controller\\CoachController::deleteCoach'], ['id'], ['DELETE' => 0], null, true, true, null]],
        553 => [[['_route' => 'app_delete_patient', '_controller' => 'App\\Controller\\PatientController::deletePatient'], ['id'], ['DELETE' => 0], null, false, true, null]],
        580 => [[['_route' => 'users_id', '_controller' => 'App\\Controller\\UsersController::getUserById'], ['id'], ['GET' => 0], null, false, true, null]],
        597 => [[['_route' => 'users_id_roles', '_controller' => 'App\\Controller\\UsersController::getRoleById'], ['id'], ['GET' => 0], null, false, false, null]],
        611 => [
            [['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UsersController::deleteUser'], ['id'], ['DELETE' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
