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
        '/api/post/resources' => [[['_route' => 'app_resources_post', '_controller' => 'App\\Controller\\ResourcesController::createPlans'], null, ['POST' => 0], null, false, false, null]],
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
                            .'|ad(?'
                                .'|min/([^/]++)(*:204)'
                                .'|vantages/([^/]++)(*:229)'
                            .')'
                            .'|co(?'
                                .'|achs/([^/]++)/(?'
                                    .'|a(?'
                                        .'|ppointments/([^/]++)(*:284)'
                                        .'|vailabilities/([^/]++)(*:314)'
                                    .')'
                                    .'|plannings/([^/]++)(*:341)'
                                .')'
                                .'|urses/([^/]++)(*:364)'
                            .')'
                            .'|files/([^/]++)(*:387)'
                            .'|plans/([^/]++)(*:409)'
                            .'|resources/([^/]++)(*:435)'
                            .'|schedules/([^/]++)(*:461)'
                            .'|text/([^/]++)(*:482)'
                            .'|users/([^/]++)(*:504)'
                        .')'
                        .'|ost/coachs/([^/]++)/(?'
                            .'|availabilities(*:550)'
                            .'|plannings(*:567)'
                        .')'
                        .'|atients/([^/]++)(*:592)'
                        .'|lan(?'
                            .'|s/([^/]++)(*:616)'
                            .'|nings/([^/]++)(*:638)'
                        .')'
                    .')'
                    .'|delete/(?'
                        .'|a(?'
                            .'|d(?'
                                .'|min/([^/]++)(*:678)'
                                .'|vantages/([^/]++)(*:703)'
                            .')'
                            .'|ppointments/([^/]++)(*:732)'
                            .'|vailabilities/([^/]++)(*:762)'
                        .')'
                        .'|co(?'
                            .'|ach(?'
                                .'|s/([^/]++)/(?'
                                    .'|a(?'
                                        .'|ppointments/([^/]++)(*:820)'
                                        .'|vailabilities/([^/]++)(*:850)'
                                    .')'
                                    .'|plannings/([^/]++)(*:877)'
                                .')'
                                .'|es/([^/]++)(*:897)'
                            .')'
                            .'|urses/([^/]++)(*:920)'
                        .')'
                        .'|files/([^/]++)(*:943)'
                        .'|p(?'
                            .'|atients/([^/]++)(*:971)'
                            .'|lans/([^/]++)(*:992)'
                        .')'
                        .'|resources/([^/]++)(*:1019)'
                        .'|schedules/([^/]++)(*:1046)'
                        .'|text/([^/]++)(*:1068)'
                    .')'
                    .'|advantages/([^/]++)(*:1097)'
                    .'|co(?'
                        .'|ach(?'
                            .'|s/([^/]++)/a(?'
                                .'|ppointments(*:1143)'
                                .'|vailabilities(*:1165)'
                            .')'
                            .'|es/([^/]++)(*:1186)'
                        .')'
                        .'|urses/([^/]++)(*:1210)'
                    .')'
                    .'|files/([^/]++)(*:1234)'
                    .'|resources/([^/]++)(*:1261)'
                    .'|schedules/([^/]++)(*:1288)'
                    .'|t(?'
                        .'|ext/([^/]++)(*:1313)'
                        .'|ransactions/([^/]++)(*:1342)'
                    .')'
                    .'|users/([^/]++)(?'
                        .'|(*:1369)'
                        .'|/(?'
                            .'|roles(*:1387)'
                            .'|delete(*:1402)'
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
        204 => [[['_route' => 'app_admin_put', '_controller' => 'App\\Controller\\AdminController::updateAdmin'], ['id'], ['PUT' => 0], null, false, true, null]],
        229 => [[['_route' => 'app_advantages_put', '_controller' => 'App\\Controller\\AdvantagesController::updateAdvantages'], ['id'], ['PUT' => 0], null, false, true, null]],
        284 => [[['_route' => 'app_appointments_put', '_controller' => 'App\\Controller\\AppointmentController::updateAppointment'], ['id', 'idAppointment'], ['PUT' => 0], null, false, true, null]],
        314 => [[['_route' => 'app_availabilities_put', '_controller' => 'App\\Controller\\AvailabilityController::updateAvailabilities'], ['id', 'idAvailability'], ['PUT' => 0], null, false, true, null]],
        341 => [[['_route' => 'app_plannings_put', '_controller' => 'App\\Controller\\PlanningRulesController::updatePlannings'], ['id', 'idPlanning'], ['PUT' => 0], null, false, true, null]],
        364 => [[['_route' => 'app_courses_put', '_controller' => 'App\\Controller\\CourseController::updateCourses'], ['id'], ['PUT' => 0], null, false, true, null]],
        387 => [[['_route' => 'app_files_put', '_controller' => 'App\\Controller\\FilesController::updateFiles'], ['id'], ['PUT' => 0], null, false, true, null]],
        409 => [[['_route' => 'app_plans_put', '_controller' => 'App\\Controller\\PlanController::updatePlans'], ['id'], ['PUT' => 0], null, false, true, null]],
        435 => [[['_route' => 'app_resources_put', '_controller' => 'App\\Controller\\ResourcesController::updateResources'], ['id'], ['PUT' => 0], null, false, true, null]],
        461 => [[['_route' => 'app_schedules_put', '_controller' => 'App\\Controller\\ScheduleController::updateSchedules'], ['id'], ['PUT' => 0], null, false, true, null]],
        482 => [[['_route' => 'app_text_put', '_controller' => 'App\\Controller\\TextController::updateText'], ['id'], ['PUT' => 0], null, false, true, null]],
        504 => [[['_route' => 'app_users_put', '_controller' => 'App\\Controller\\UsersController::updateUsers'], ['id'], ['PUT' => 0], null, false, true, null]],
        550 => [[['_route' => 'app_availabilities_post', '_controller' => 'App\\Controller\\AvailabilityController::createAvailabilities'], ['id'], ['POST' => 0], null, false, false, null]],
        567 => [[['_route' => 'app_plannings_post', '_controller' => 'App\\Controller\\PlanningRulesController::createPlannings'], ['id'], ['POST' => 0], null, false, false, null]],
        592 => [[['_route' => 'patient_id', '_controller' => 'App\\Controller\\PatientController::getPatientById'], ['id'], ['GET' => 0], null, false, true, null]],
        616 => [[['_route' => 'plans_id', '_controller' => 'App\\Controller\\PlanController::getPlanById'], ['id'], ['GET' => 0], null, false, true, null]],
        638 => [[['_route' => 'planning_id', '_controller' => 'App\\Controller\\PlanningRulesController::getPlanningById'], ['id'], ['GET' => 0], null, false, true, null]],
        678 => [[['_route' => 'delete_admin', '_controller' => 'App\\Controller\\AdminController::deleteAdmin'], ['id'], ['DELETE' => 0], null, false, true, null]],
        703 => [[['_route' => 'delete_advantages', '_controller' => 'App\\Controller\\AdvantagesController::deleteAdvantages'], ['id'], ['DELETE' => 0], null, false, true, null]],
        732 => [[['_route' => 'delete_appointment', '_controller' => 'App\\Controller\\AppointmentController::deleteAppointment'], ['id'], ['DELETE' => 0], null, false, true, null]],
        762 => [[['_route' => 'delete_availability_id', '_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilityById'], ['id'], ['DELETE' => 0], null, false, true, null]],
        820 => [[['_route' => 'app_appointments_delete', '_controller' => 'App\\Controller\\AppointmentController::deleteAppointments'], ['id', 'idAppointment'], ['DELETE' => 0], null, false, true, null]],
        850 => [[['_route' => 'app_availabilities_delete', '_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilities'], ['id', 'idAvailability'], ['DELETE' => 0], null, false, true, null]],
        877 => [[['_route' => 'delete_plannings', '_controller' => 'App\\Controller\\PlanningRulesController::deletePlannings'], ['id', 'idPlanning'], ['DELETE' => 0], null, false, true, null]],
        897 => [[['_route' => 'app_delete_coach', '_controller' => 'App\\Controller\\CoachController::deleteCoach'], ['id'], ['DELETE' => 0], null, true, true, null]],
        920 => [[['_route' => 'delete_courses', '_controller' => 'App\\Controller\\CourseController::deleteCourses'], ['id'], ['DELETE' => 0], null, false, true, null]],
        943 => [[['_route' => 'delete_files', '_controller' => 'App\\Controller\\FilesController::deleteFiles'], ['id'], ['DELETE' => 0], null, false, true, null]],
        971 => [[['_route' => 'app_delete_patient', '_controller' => 'App\\Controller\\PatientController::deletePatient'], ['id'], ['DELETE' => 0], null, false, true, null]],
        992 => [[['_route' => 'delete_plans', '_controller' => 'App\\Controller\\PlanController::deleteCourses'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1019 => [[['_route' => 'delete_resources', '_controller' => 'App\\Controller\\ResourcesController::deleteResources'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1046 => [[['_route' => 'delete_schedules', '_controller' => 'App\\Controller\\ScheduleController::deleteSchedules'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1068 => [[['_route' => 'delete_text', '_controller' => 'App\\Controller\\TextController::deleteText'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1097 => [[['_route' => 'app_advantages_id', '_controller' => 'App\\Controller\\AdvantagesController::getAdvantagebyId'], ['id'], ['GET' => 0], null, false, true, null]],
        1143 => [[['_route' => 'app_coach_appointment', '_controller' => 'App\\Controller\\AppointmentController::getAppointmentByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        1165 => [[['_route' => 'app_coach_availabilities', '_controller' => 'App\\Controller\\AvailabilityController::getAvailabilitiesByCoachId'], ['id'], ['GET' => 0], null, false, false, null]],
        1186 => [[['_route' => 'coach_id', '_controller' => 'App\\Controller\\CoachController::getCoachById'], ['id'], ['GET' => 0], null, false, true, null]],
        1210 => [[['_route' => 'app_courses_id', '_controller' => 'App\\Controller\\CourseController::getCoursesbyId'], ['id'], ['GET' => 0], null, false, true, null]],
        1234 => [[['_route' => 'app_files_id', '_controller' => 'App\\Controller\\FilesController::getFilesbyId'], ['id'], ['GET' => 0], null, false, true, null]],
        1261 => [[['_route' => 'resources_id', '_controller' => 'App\\Controller\\ResourcesController::getResourcesById'], ['id'], ['GET' => 0], null, false, true, null]],
        1288 => [[['_route' => 'schedule_id', '_controller' => 'App\\Controller\\ScheduleController::getScheduleById'], ['id'], ['GET' => 0], null, false, true, null]],
        1313 => [[['_route' => 'app_text_id', '_controller' => 'App\\Controller\\TextController::getTextbyId'], ['id'], ['GET' => 0], null, false, true, null]],
        1342 => [[['_route' => 'transactions_id', '_controller' => 'App\\Controller\\TransactionController::getTransactionsById'], ['id'], ['GET' => 0], null, false, true, null]],
        1369 => [[['_route' => 'users_id', '_controller' => 'App\\Controller\\UsersController::getUserById'], ['id'], ['GET' => 0], null, false, true, null]],
        1387 => [[['_route' => 'users_id_roles', '_controller' => 'App\\Controller\\UsersController::getRoleById'], ['id'], ['GET' => 0], null, false, false, null]],
        1402 => [
            [['_route' => 'app_users_delete', '_controller' => 'App\\Controller\\UsersController::deleteUser'], ['id'], ['DELETE' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
