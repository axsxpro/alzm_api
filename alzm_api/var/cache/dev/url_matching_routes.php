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
        '/api/appointments' => [[['_route' => 'app_all_appointments', '_controller' => 'App\\Controller\\AppointmentController::getAppointments'], null, ['GET' => 0], null, false, false, null]],
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
                    .'|co(?'
                        .'|ach(?'
                            .'|s/([^/]++)/a(?'
                                .'|ppointments(*:214)'
                                .'|vailabilities(*:235)'
                            .')'
                            .'|es/([^/]++)(*:255)'
                        .')'
                        .'|urses/([^/]++)(*:278)'
                    .')'
                    .'|delete/(?'
                        .'|a(?'
                            .'|ppointments/([^/]++)(*:321)'
                            .'|vailabilities/([^/]++)(*:351)'
                        .')'
                        .'|co(?'
                            .'|ach(?'
                                .'|s/([^/]++)/(?'
                                    .'|availabilities/([^/]++)(*:408)'
                                    .'|plannings/([^/]++)(*:434)'
                                .')'
                                .'|es/([^/]++)(*:454)'
                            .')'
                            .'|urses/([^/]++)(*:477)'
                        .')'
                        .'|p(?'
                            .'|atients/([^/]++)(*:506)'
                            .'|lans/([^/]++)(*:527)'
                        .')'
                    .')'
                    .'|p(?'
                        .'|ost/coachs/([^/]++)/(?'
                            .'|availabilities(*:578)'
                            .'|plannings(*:595)'
                        .')'
                        .'|ut/(?'
                            .'|co(?'
                                .'|achs/([^/]++)/(?'
                                    .'|availabilities/([^/]++)(*:655)'
                                    .'|plannings/([^/]++)(*:681)'
                                .')'
                                .'|urses/([^/]++)(*:704)'
                            .')'
                            .'|plans/([^/]++)(*:727)'
                            .'|users/([^/]++)(*:749)'
                        .')'
                        .'|atients/([^/]++)(*:774)'
                        .'|lan(?'
                            .'|s/([^/]++)(*:798)'
                            .'|nings/([^/]++)(*:820)'
                        .')'
                    .')'
                    .'|users/([^/]++)(?'
                        .'|(*:847)'
                        .'|/(?'
                            .'|roles(*:864)'
                            .'|delete(*:878)'
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
        214 => [[['_route' => 'app_coach_appointment', '_controller' => 'App\\Controller\\AppointmentController::getAppointmentByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        235 => [[['_route' => 'app_coach_availabilities', '_controller' => 'App\\Controller\\AvailabilityController::getAvailabilitiesByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        255 => [[['_route' => 'coach_id', '_controller' => 'App\\Controller\\CoachController::getCoachById'], ['id'], ['GET' => 0], null, false, true, null]],
        278 => [[['_route' => 'app_courses_id', '_controller' => 'App\\Controller\\CourseController::getCoursesbyId'], ['id'], ['GET' => 0], null, false, true, null]],
        321 => [[['_route' => 'delete_appointment', '_controller' => 'App\\Controller\\AppointmentController::deleteAppointment'], ['id'], ['DELETE' => 0], null, false, true, null]],
        351 => [[['_route' => 'delete_availability_id', '_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilityById'], ['id'], ['DELETE' => 0], null, false, true, null]],
        408 => [[['_route' => 'app_availabilities_delete', '_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilities'], ['id', 'idAvailability'], ['DELETE' => 0], null, false, true, null]],
        434 => [[['_route' => 'delete_plannings', '_controller' => 'App\\Controller\\PlanningRulesController::deletePlannings'], ['id', 'idPlanning'], ['DELETE' => 0], null, false, true, null]],
        454 => [[['_route' => 'app_delete_coach', '_controller' => 'App\\Controller\\CoachController::deleteCoach'], ['id'], ['DELETE' => 0], null, true, true, null]],
        477 => [[['_route' => 'delete_courses', '_controller' => 'App\\Controller\\CourseController::deleteCourses'], ['id'], ['DELETE' => 0], null, false, true, null]],
        506 => [[['_route' => 'app_delete_patient', '_controller' => 'App\\Controller\\PatientController::deletePatient'], ['id'], ['DELETE' => 0], null, false, true, null]],
        527 => [[['_route' => 'delete_plans', '_controller' => 'App\\Controller\\PlanController::deleteCourses'], ['id'], ['DELETE' => 0], null, false, true, null]],
        578 => [[['_route' => 'app_availabilities_post', '_controller' => 'App\\Controller\\AvailabilityController::createAvailabilities'], ['id'], ['POST' => 0], null, false, false, null]],
        595 => [[['_route' => 'app_plannings_post', '_controller' => 'App\\Controller\\PlanningRulesController::createPlannings'], ['id'], ['POST' => 0], null, false, false, null]],
        655 => [[['_route' => 'app_availabilities_put', '_controller' => 'App\\Controller\\AvailabilityController::updateAvailabilities'], ['id', 'idAvailability'], ['PUT' => 0], null, false, true, null]],
        681 => [[['_route' => 'app_plannings_put', '_controller' => 'App\\Controller\\PlanningRulesController::updatePlannings'], ['id', 'idPlanning'], ['PUT' => 0], null, false, true, null]],
        704 => [[['_route' => 'app_courses_put', '_controller' => 'App\\Controller\\CourseController::updateCourses'], ['id'], ['PUT' => 0], null, false, true, null]],
        727 => [[['_route' => 'app_plans_put', '_controller' => 'App\\Controller\\PlanController::updatePlans'], ['id'], ['PUT' => 0], null, false, true, null]],
        749 => [[['_route' => 'app_users_put', '_controller' => 'App\\Controller\\UsersController::updateUsers'], ['id'], ['PUT' => 0], null, false, true, null]],
        774 => [[['_route' => 'patient_id', '_controller' => 'App\\Controller\\PatientController::getPatientById'], ['id'], ['GET' => 0], null, false, true, null]],
        798 => [[['_route' => 'plans_id', '_controller' => 'App\\Controller\\PlanController::getPlanById'], ['id'], ['GET' => 0], null, false, true, null]],
        820 => [[['_route' => 'planning_id', '_controller' => 'App\\Controller\\PlanningRulesController::getPlanningById'], ['id'], ['GET' => 0], null, false, true, null]],
        847 => [[['_route' => 'users_id', '_controller' => 'App\\Controller\\UsersController::getUserById'], ['id'], ['GET' => 0], null, false, true, null]],
        864 => [[['_route' => 'users_id_roles', '_controller' => 'App\\Controller\\UsersController::getRoleById'], ['id'], ['GET' => 0], null, false, false, null]],
        878 => [
            [['_route' => 'app_users_delete', '_controller' => 'App\\Controller\\UsersController::deleteUser'], ['id'], ['DELETE' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
