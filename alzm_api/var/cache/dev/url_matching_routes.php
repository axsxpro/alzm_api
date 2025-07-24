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
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::allAdmin'], null, ['GET' => 0], null, false, false, null]],
        '/api/advantages' => [[['_route' => 'app_advantages', '_controller' => 'App\\Controller\\AdvantagesController::getAdvantages'], null, ['GET' => 0], null, true, false, null]],
        '/api/post/advantages' => [[['_route' => 'app_advantages_post', '_controller' => 'App\\Controller\\AdvantagesController::createAdvantages'], null, ['POST' => 0], null, false, false, null]],
        '/api/appointments' => [[['_route' => 'app_appointments', '_controller' => 'App\\Controller\\AppointmentController::getAppointments'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/appointments' => [[['_route' => 'app_appointments_post', '_controller' => 'App\\Controller\\AppointmentController::createAppointment'], null, ['POST' => 0], null, false, false, null]],
        '/api/availabilities' => [[['_route' => 'app_availabilities', '_controller' => 'App\\Controller\\AvailabilityController::getAvailabilities'], null, ['GET' => 0], null, false, false, null]],
        '/api/coaches' => [[['_route' => 'app_all_coach', '_controller' => 'App\\Controller\\CoachController::getCoachs'], null, ['GET' => 0], null, false, false, null]],
        '/api/courses' => [[['_route' => 'app_courses', '_controller' => 'App\\Controller\\CourseController::getCourses'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/courses' => [[['_route' => 'app_courses_post', '_controller' => 'App\\Controller\\CourseController::createCourses'], null, ['POST' => 0], null, false, false, null]],
        '/api/files' => [[['_route' => 'app_files', '_controller' => 'App\\Controller\\FilesController::getFiles'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/files' => [[['_route' => 'app_files_post', '_controller' => 'App\\Controller\\FilesController::createFiles'], null, ['POST' => 0], null, false, false, null]],
        '/connect/google' => [[['_route' => 'connect_google', '_controller' => 'App\\Controller\\GoogleOAuthController::connectAction'], null, null, null, false, false, null]],
        '/connect/google/check' => [[['_route' => 'connect_google_check', '_controller' => 'App\\Controller\\GoogleOAuthController::connectCheckAction'], null, null, null, false, false, null]],
        '/home' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomePageController::index'], null, null, null, false, false, null]],
        '/api/patients' => [[['_route' => 'app_all_patient', '_controller' => 'App\\Controller\\PatientController::getPatients'], null, ['GET' => 0], null, false, false, null]],
        '/api/plans' => [[['_route' => 'app_plans', '_controller' => 'App\\Controller\\PlanController::getPlans'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/plans' => [[['_route' => 'app_plans_post', '_controller' => 'App\\Controller\\PlanController::createPlans'], null, ['POST' => 0], null, false, false, null]],
        '/api/plannings' => [[['_route' => 'app_planning_rules', '_controller' => 'App\\Controller\\PlanningRulesController::getPlanningsRules'], null, ['GET' => 0], null, false, false, null]],
        '/api/resources' => [[['_route' => 'app_resources', '_controller' => 'App\\Controller\\ResourcesController::getRessources'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/resources' => [[['_route' => 'app_resources_post', '_controller' => 'App\\Controller\\ResourcesController::createResources'], null, ['POST' => 0], null, false, false, null]],
        '/api/schedules' => [[['_route' => 'app_schedules', '_controller' => 'App\\Controller\\ScheduleController::getSchedules'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/schedules' => [[['_route' => 'app_schedules_post', '_controller' => 'App\\Controller\\ScheduleController::createSchedules'], null, ['POST' => 0], null, false, false, null]],
        '/api/text' => [[['_route' => 'app_text', '_controller' => 'App\\Controller\\TextController::getText'], null, ['GET' => 0], null, false, false, null]],
        '/api/post/text' => [[['_route' => 'app_text_post', '_controller' => 'App\\Controller\\TextController::createText'], null, ['POST' => 0], null, false, false, null]],
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
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/api/(?'
                    .'|p(?'
                        .'|ut/(?'
                            .'|ad(?'
                                .'|min/([^/]++)(*:237)'
                                .'|vantages/([^/]++)(*:262)'
                            .')'
                            .'|co(?'
                                .'|achs/([^/]++)/(?'
                                    .'|a(?'
                                        .'|ppointments/([^/]++)(*:317)'
                                        .'|vailabilities/([^/]++)(*:347)'
                                    .')'
                                    .'|plannings/([^/]++)(*:374)'
                                .')'
                                .'|urses/([^/]++)(*:397)'
                            .')'
                            .'|files/([^/]++)(*:420)'
                            .'|plans/([^/]++)(*:442)'
                            .'|resources/([^/]++)(*:468)'
                            .'|schedules/([^/]++)(*:494)'
                            .'|text/([^/]++)(*:515)'
                            .'|users/([^/]++)(*:537)'
                        .')'
                        .'|ost/coachs/([^/]++)/(?'
                            .'|availabilities(*:583)'
                            .'|plannings(*:600)'
                        .')'
                        .'|atients/([^/]++)(*:625)'
                        .'|lan(?'
                            .'|s/([^/]++)(*:649)'
                            .'|nings/([^/]++)(*:671)'
                        .')'
                    .')'
                    .'|delete/(?'
                        .'|a(?'
                            .'|d(?'
                                .'|min/([^/]++)(*:711)'
                                .'|vantages/([^/]++)(*:736)'
                            .')'
                            .'|ppointments/([^/]++)(*:765)'
                            .'|vailabilities/([^/]++)(*:795)'
                        .')'
                        .'|co(?'
                            .'|ach(?'
                                .'|s/([^/]++)/(?'
                                    .'|a(?'
                                        .'|ppointments/([^/]++)(*:853)'
                                        .'|vailabilities/([^/]++)(*:883)'
                                    .')'
                                    .'|plannings/([^/]++)(*:910)'
                                .')'
                                .'|es/([^/]++)(*:930)'
                            .')'
                            .'|urses/([^/]++)(*:953)'
                        .')'
                        .'|files/([^/]++)(*:976)'
                        .'|p(?'
                            .'|atients/([^/]++)(*:1004)'
                            .'|lans/([^/]++)(*:1026)'
                        .')'
                        .'|resources/([^/]++)(*:1054)'
                        .'|schedules/([^/]++)(*:1081)'
                        .'|text/([^/]++)(*:1103)'
                    .')'
                    .'|advantages/([^/]++)(*:1132)'
                    .'|co(?'
                        .'|ach(?'
                            .'|s/([^/]++)/a(?'
                                .'|ppointments(*:1178)'
                                .'|vailabilities(*:1200)'
                            .')'
                            .'|es/([^/]++)(*:1221)'
                        .')'
                        .'|urses/([^/]++)(*:1245)'
                    .')'
                    .'|files/([^/]++)(*:1269)'
                    .'|resources/([^/]++)(*:1296)'
                    .'|schedules/([^/]++)(*:1323)'
                    .'|t(?'
                        .'|ext/([^/]++)(*:1348)'
                        .'|ransactions/([^/]++)(*:1377)'
                    .')'
                    .'|users/([^/]++)(?'
                        .'|(*:1404)'
                        .'|/(?'
                            .'|roles(*:1422)'
                            .'|delete(*:1437)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        237 => [[['_route' => 'app_admin_put', '_controller' => 'App\\Controller\\AdminController::updateAdmin'], ['id'], ['PUT' => 0], null, false, true, null]],
        262 => [[['_route' => 'app_advantages_put', '_controller' => 'App\\Controller\\AdvantagesController::updateAdvantages'], ['id'], ['PUT' => 0], null, false, true, null]],
        317 => [[['_route' => 'app_appointments_put', '_controller' => 'App\\Controller\\AppointmentController::updateAppointment'], ['id', 'idAppointment'], ['PUT' => 0], null, false, true, null]],
        347 => [[['_route' => 'app_availabilities_put', '_controller' => 'App\\Controller\\AvailabilityController::updateAvailabilities'], ['id', 'idAvailability'], ['PUT' => 0], null, false, true, null]],
        374 => [[['_route' => 'app_plannings_put', '_controller' => 'App\\Controller\\PlanningRulesController::updatePlannings'], ['id', 'idPlanning'], ['PUT' => 0], null, false, true, null]],
        397 => [[['_route' => 'app_courses_put', '_controller' => 'App\\Controller\\CourseController::updateCourses'], ['id'], ['PUT' => 0], null, false, true, null]],
        420 => [[['_route' => 'app_files_put', '_controller' => 'App\\Controller\\FilesController::updateFiles'], ['id'], ['PUT' => 0], null, false, true, null]],
        442 => [[['_route' => 'app_plans_put', '_controller' => 'App\\Controller\\PlanController::updatePlans'], ['id'], ['PUT' => 0], null, false, true, null]],
        468 => [[['_route' => 'app_resources_put', '_controller' => 'App\\Controller\\ResourcesController::updateResources'], ['id'], ['PUT' => 0], null, false, true, null]],
        494 => [[['_route' => 'app_schedules_put', '_controller' => 'App\\Controller\\ScheduleController::updateSchedules'], ['id'], ['PUT' => 0], null, false, true, null]],
        515 => [[['_route' => 'app_text_put', '_controller' => 'App\\Controller\\TextController::updateText'], ['id'], ['PUT' => 0], null, false, true, null]],
        537 => [[['_route' => 'app_users_put', '_controller' => 'App\\Controller\\UsersController::updateUsers'], ['id'], ['PUT' => 0], null, false, true, null]],
        583 => [[['_route' => 'app_availabilities_post', '_controller' => 'App\\Controller\\AvailabilityController::createAvailabilities'], ['id'], ['POST' => 0], null, false, false, null]],
        600 => [[['_route' => 'app_plannings_post', '_controller' => 'App\\Controller\\PlanningRulesController::createPlannings'], ['id'], ['POST' => 0], null, false, false, null]],
        625 => [[['_route' => 'patient_id', '_controller' => 'App\\Controller\\PatientController::getPatientById'], ['id'], ['GET' => 0], null, false, true, null]],
        649 => [[['_route' => 'plans_id', '_controller' => 'App\\Controller\\PlanController::getPlanById'], ['id'], ['GET' => 0], null, false, true, null]],
        671 => [[['_route' => 'planning_id', '_controller' => 'App\\Controller\\PlanningRulesController::getPlanningById'], ['id'], ['GET' => 0], null, false, true, null]],
        711 => [[['_route' => 'delete_admin', '_controller' => 'App\\Controller\\AdminController::deleteAdmin'], ['id'], ['DELETE' => 0], null, false, true, null]],
        736 => [[['_route' => 'delete_advantages', '_controller' => 'App\\Controller\\AdvantagesController::deleteAdvantages'], ['id'], ['DELETE' => 0], null, false, true, null]],
        765 => [[['_route' => 'delete_appointment', '_controller' => 'App\\Controller\\AppointmentController::deleteAppointment'], ['id'], ['DELETE' => 0], null, false, true, null]],
        795 => [[['_route' => 'delete_availability_id', '_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilityById'], ['id'], ['DELETE' => 0], null, false, true, null]],
        853 => [[['_route' => 'app_appointments_delete', '_controller' => 'App\\Controller\\AppointmentController::deleteAppointments'], ['id', 'idAppointment'], ['DELETE' => 0], null, false, true, null]],
        883 => [[['_route' => 'app_availabilities_delete', '_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilities'], ['id', 'idAvailability'], ['DELETE' => 0], null, false, true, null]],
        910 => [[['_route' => 'delete_plannings', '_controller' => 'App\\Controller\\PlanningRulesController::deletePlannings'], ['id', 'idPlanning'], ['DELETE' => 0], null, false, true, null]],
        930 => [[['_route' => 'app_delete_coach', '_controller' => 'App\\Controller\\CoachController::deleteCoach'], ['id'], ['DELETE' => 0], null, true, true, null]],
        953 => [[['_route' => 'delete_courses', '_controller' => 'App\\Controller\\CourseController::deleteCourses'], ['id'], ['DELETE' => 0], null, false, true, null]],
        976 => [[['_route' => 'delete_files', '_controller' => 'App\\Controller\\FilesController::deleteFiles'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1004 => [[['_route' => 'app_delete_patient', '_controller' => 'App\\Controller\\PatientController::deletePatient'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1026 => [[['_route' => 'delete_plans', '_controller' => 'App\\Controller\\PlanController::deletePlans'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1054 => [[['_route' => 'delete_resources', '_controller' => 'App\\Controller\\ResourcesController::deleteResources'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1081 => [[['_route' => 'delete_schedules', '_controller' => 'App\\Controller\\ScheduleController::deleteSchedules'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1103 => [[['_route' => 'delete_text', '_controller' => 'App\\Controller\\TextController::deleteText'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1132 => [[['_route' => 'app_advantages_id', '_controller' => 'App\\Controller\\AdvantagesController::getAdvantagebyId'], ['id'], ['GET' => 0], null, false, true, null]],
        1178 => [[['_route' => 'app_coach_appointment', '_controller' => 'App\\Controller\\AppointmentController::getAppointmentByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        1200 => [[['_route' => 'app_coach_availabilities', '_controller' => 'App\\Controller\\AvailabilityController::getAvailabilitiesByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        1221 => [[['_route' => 'coach_id', '_controller' => 'App\\Controller\\CoachController::getCoachById'], ['id'], ['GET' => 0], null, false, true, null]],
        1245 => [[['_route' => 'app_courses_id', '_controller' => 'App\\Controller\\CourseController::getCoursesbyId'], ['id'], ['GET' => 0], null, false, true, null]],
        1269 => [[['_route' => 'app_files_id', '_controller' => 'App\\Controller\\FilesController::getFilesbyId'], ['id'], ['GET' => 0], null, false, true, null]],
        1296 => [[['_route' => 'resources_id', '_controller' => 'App\\Controller\\ResourcesController::getResourcesById'], ['id'], ['GET' => 0], null, false, true, null]],
        1323 => [[['_route' => 'schedule_id', '_controller' => 'App\\Controller\\ScheduleController::getScheduleById'], ['id'], ['GET' => 0], null, false, true, null]],
        1348 => [[['_route' => 'app_text_id', '_controller' => 'App\\Controller\\TextController::getTextbyId'], ['id'], ['GET' => 0], null, false, true, null]],
        1377 => [[['_route' => 'transactions_id', '_controller' => 'App\\Controller\\TransactionController::getTransactionsById'], ['id'], ['GET' => 0], null, false, true, null]],
        1404 => [[['_route' => 'users_id', '_controller' => 'App\\Controller\\UsersController::getUserById'], ['id'], ['GET' => 0], null, false, true, null]],
        1422 => [[['_route' => 'users_id_roles', '_controller' => 'App\\Controller\\UsersController::getRoleById'], ['id'], ['GET' => 0], null, false, false, null]],
        1437 => [
            [['_route' => 'app_users_delete', '_controller' => 'App\\Controller\\UsersController::deleteUser'], ['id'], ['DELETE' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
