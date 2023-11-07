<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'app_all_admin' => [[], ['_controller' => 'App\\Controller\\AdminController::allAdmin'], [], [['text', '/admin/all']], [], [], []],
    'app_all_advantages' => [[], ['_controller' => 'App\\Controller\\AdvantagesController::allAdvantages'], [], [['text', '/advantages/all']], [], [], []],
    'app_all_appointments' => [[], ['_controller' => 'App\\Controller\\AppointmentController::allAppointment'], [], [['text', '/appointments']], [], [], []],
    'app_appointments_post' => [[], ['_controller' => 'App\\Controller\\AppointmentController::createUsers'], [], [['text', '/post/appointments']], [], [], []],
    'app_coach_appointment' => [['id'], ['_controller' => 'App\\Controller\\AppointmentController::appointmentByCoachId'], [], [['text', '/appointments'], ['variable', '/', '[^/]++', 'id', true], ['text', '/coachs']], [], [], []],
    'delete_appointment' => [['id'], ['_controller' => 'App\\Controller\\AppointmentController::deleteAppointment'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/appointments']], [], [], []],
    'app_availabilities' => [[], ['_controller' => 'App\\Controller\\AvailabilityController::allAvailabilities'], [], [['text', '/availabilities']], [], [], []],
    'app_coach_availabilities' => [['id'], ['_controller' => 'App\\Controller\\AvailabilityController::availabilitiesByCoachId'], [], [['text', '/availabilities'], ['variable', '/', '[^/]++', 'id', true], ['text', '/coachs']], [], [], []],
    'app_availabilities_post' => [['id'], ['_controller' => 'App\\Controller\\AvailabilityController::createUsers'], [], [['text', '/availabilities'], ['variable', '/', '[^/]++', 'id', true], ['text', '/post/coachs']], [], [], []],
    'app_availabilities_put' => [['id', 'id_availability'], ['_controller' => 'App\\Controller\\AvailabilityController::updateAvailabilities'], [], [['variable', '/', '[^/]++', 'id_availability', true], ['text', '/availabilities'], ['variable', '/', '[^/]++', 'id', true], ['text', '/put/coachs']], [], [], []],
    'app_all_coach' => [[], ['_controller' => 'App\\Controller\\CoachController::allCoach'], [], [['text', '/coachs']], [], [], []],
    'app_all_course' => [[], ['_controller' => 'App\\Controller\\CourseController::allCourse'], [], [['text', '/course/all']], [], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\HomePageController::index'], [], [['text', '/']], [], [], []],
    'app_all_patient' => [[], ['_controller' => 'App\\Controller\\PatientController::allPatient'], [], [['text', '/patients']], [], [], []],
    'patient_id' => [['id'], ['_controller' => 'App\\Controller\\PatientController::getallPatients'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/patients']], [], [], []],
    'app_all_plan' => [[], ['_controller' => 'App\\Controller\\PlanController::allPlan'], [], [['text', '/plan/all']], [], [], []],
    'app_all_planning_rules' => [[], ['_controller' => 'App\\Controller\\PlanningRulesController::allPlan'], [], [['text', '/planningrules/all']], [], [], []],
    'planning_id' => [['idPlanningRules'], ['_controller' => 'App\\Controller\\PlanningRulesController::getPlanningById'], [], [['variable', '/', '[^/]++', 'idPlanningRules', true], ['text', '/planningrules/all']], [], [], []],
    'app_all_transaction' => [[], ['_controller' => 'App\\Controller\\TransactionController::allTransaction'], [], [['text', '/transaction/all']], [], [], []],
    'app_users' => [[], ['_controller' => 'App\\Controller\\UsersController::getUsers'], [], [['text', '/users']], [], [], []],
    'users_id' => [['id'], ['_controller' => 'App\\Controller\\UsersController::getUserById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/users']], [], [], []],
    'users_id_roles' => [['id'], ['_controller' => 'App\\Controller\\UsersController::getRoleById'], [], [['text', '/roles'], ['variable', '/', '[^/]++', 'id', true], ['text', '/users']], [], [], []],
    'app_users_post' => [[], ['_controller' => 'App\\Controller\\UsersController::createUsers'], [], [['text', '/post/users']], [], [], []],
    'app_users_put' => [['id'], ['_controller' => 'App\\Controller\\UsersController::updateUsers'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/put/users']], [], [], []],
    'app_user_delete_coach' => [['id'], ['_controller' => 'App\\Controller\\UsersController::deleteCoach'], [], [['text', '/delete/coach'], ['variable', '/', '[^/]++', 'id', true], ['text', '/users']], [], [], []],
    'app_user_delete_patient' => [['id'], ['_controller' => 'App\\Controller\\UsersController::deletePatient'], [], [['text', '/delete/patient'], ['variable', '/', '[^/]++', 'id', true], ['text', '/users']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
];
