<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'app.swagger' => [[], ['_controller' => 'nelmio_api_doc.controller.swagger'], [], [['text', '/api/doc.json']], [], [], []],
    'app.swagger_ui' => [[], ['_controller' => 'nelmio_api_doc.controller.swagger_ui'], [], [['text', '/api/doc']], [], [], []],
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
    'app_admin' => [[], ['_controller' => 'App\\Controller\\AdminController::allAdmin'], [], [['text', '/api/admin']], [], [], []],
    'app_admin_put' => [['id'], ['_controller' => 'App\\Controller\\AdminController::updateAdmin'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/admin']], [], [], []],
    'delete_admin' => [['id'], ['_controller' => 'App\\Controller\\AdminController::deleteAdmin'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/admin']], [], [], []],
    'app_advantages' => [[], ['_controller' => 'App\\Controller\\AdvantagesController::getAdvantages'], [], [['text', '/api/advantages/']], [], [], []],
    'app_advantages_id' => [['id'], ['_controller' => 'App\\Controller\\AdvantagesController::getAdvantagebyId'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/advantages']], [], [], []],
    'app_advantages_post' => [[], ['_controller' => 'App\\Controller\\AdvantagesController::createAdvantages'], [], [['text', '/api/post/advantages']], [], [], []],
    'app_advantages_put' => [['id'], ['_controller' => 'App\\Controller\\AdvantagesController::updateAdvantages'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/advantages']], [], [], []],
    'delete_advantages' => [['id'], ['_controller' => 'App\\Controller\\AdvantagesController::deleteAdvantages'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/advantages']], [], [], []],
    'app_appointments' => [[], ['_controller' => 'App\\Controller\\AppointmentController::getAppointments'], [], [['text', '/api/appointments']], [], [], []],
    'app_coach_appointment' => [['id'], ['_controller' => 'App\\Controller\\AppointmentController::getAppointmentByCoachId'], [], [['text', '/appointments'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/coachs']], [], [], []],
    'app_appointments_post' => [[], ['_controller' => 'App\\Controller\\AppointmentController::createAppointment'], [], [['text', '/api/post/appointments']], [], [], []],
    'app_appointments_put' => [['id', 'idAppointment'], ['_controller' => 'App\\Controller\\AppointmentController::updateAppointment'], [], [['variable', '/', '[^/]++', 'idAppointment', true], ['text', '/appointments'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/coachs']], [], [], []],
    'app_appointments_delete' => [['id', 'idAppointment'], ['_controller' => 'App\\Controller\\AppointmentController::deleteAppointments'], [], [['variable', '/', '[^/]++', 'idAppointment', true], ['text', '/appointments'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/coachs']], [], [], []],
    'delete_appointment' => [['id'], ['_controller' => 'App\\Controller\\AppointmentController::deleteAppointment'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/appointments']], [], [], []],
    'app_availabilities' => [[], ['_controller' => 'App\\Controller\\AvailabilityController::getAvailabilities'], [], [['text', '/api/availabilities']], [], [], []],
    'app_coach_availabilities' => [['id'], ['_controller' => 'App\\Controller\\AvailabilityController::getAvailabilitiesByCoachId'], [], [['text', '/availabilities'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/coachs']], [], [], []],
    'app_availabilities_post' => [['id'], ['_controller' => 'App\\Controller\\AvailabilityController::createAvailabilities'], [], [['text', '/availabilities'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/post/coachs']], [], [], []],
    'app_availabilities_put' => [['id', 'idAvailability'], ['_controller' => 'App\\Controller\\AvailabilityController::updateAvailabilities'], [], [['variable', '/', '[^/]++', 'idAvailability', true], ['text', '/availabilities'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/coachs']], [], [], []],
    'app_availabilities_delete' => [['id', 'idAvailability'], ['_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilities'], [], [['variable', '/', '[^/]++', 'idAvailability', true], ['text', '/availabilities'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/coachs']], [], [], []],
    'delete_availability_id' => [['id'], ['_controller' => 'App\\Controller\\AvailabilityController::deleteAvailabilityById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/availabilities']], [], [], []],
    'app_all_coach' => [[], ['_controller' => 'App\\Controller\\CoachController::getCoachs'], [], [['text', '/api/coaches']], [], [], []],
    'coach_id' => [['id'], ['_controller' => 'App\\Controller\\CoachController::getCoachById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/coaches']], [], [], []],
    'app_delete_coach' => [['id'], ['_controller' => 'App\\Controller\\CoachController::deleteCoach'], [], [['text', '/'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/coaches']], [], [], []],
    'app_courses' => [[], ['_controller' => 'App\\Controller\\CourseController::getCourses'], [], [['text', '/api/courses']], [], [], []],
    'app_courses_id' => [['id'], ['_controller' => 'App\\Controller\\CourseController::getCoursesbyId'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/courses']], [], [], []],
    'app_courses_post' => [[], ['_controller' => 'App\\Controller\\CourseController::createCourses'], [], [['text', '/api/post/courses']], [], [], []],
    'app_courses_put' => [['id'], ['_controller' => 'App\\Controller\\CourseController::updateCourses'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/courses']], [], [], []],
    'delete_courses' => [['id'], ['_controller' => 'App\\Controller\\CourseController::deleteCourses'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/courses']], [], [], []],
    'app_files' => [[], ['_controller' => 'App\\Controller\\FilesController::getFiles'], [], [['text', '/api/files']], [], [], []],
    'app_files_id' => [['id'], ['_controller' => 'App\\Controller\\FilesController::getFilesbyId'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/files']], [], [], []],
    'app_files_post' => [[], ['_controller' => 'App\\Controller\\FilesController::createFiles'], [], [['text', '/api/post/files']], [], [], []],
    'app_files_put' => [['id'], ['_controller' => 'App\\Controller\\FilesController::updateFiles'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/files']], [], [], []],
    'delete_files' => [['id'], ['_controller' => 'App\\Controller\\FilesController::deleteFiles'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/files']], [], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\HomePageController::index'], [], [['text', '/home']], [], [], []],
    'app_all_patient' => [[], ['_controller' => 'App\\Controller\\PatientController::getPatients'], [], [['text', '/api/patients']], [], [], []],
    'patient_id' => [['id'], ['_controller' => 'App\\Controller\\PatientController::getPatientById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/patients']], [], [], []],
    'app_delete_patient' => [['id'], ['_controller' => 'App\\Controller\\PatientController::deletePatient'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/patients']], [], [], []],
    'app_plans' => [[], ['_controller' => 'App\\Controller\\PlanController::getPlans'], [], [['text', '/api/plans']], [], [], []],
    'plans_id' => [['id'], ['_controller' => 'App\\Controller\\PlanController::getPlanById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/plans']], [], [], []],
    'app_plans_post' => [[], ['_controller' => 'App\\Controller\\PlanController::createPlans'], [], [['text', '/api/post/plans']], [], [], []],
    'app_plans_put' => [['id'], ['_controller' => 'App\\Controller\\PlanController::updatePlans'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/plans']], [], [], []],
    'delete_plans' => [['id'], ['_controller' => 'App\\Controller\\PlanController::deleteCourses'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/plans']], [], [], []],
    'app_planning_rules' => [[], ['_controller' => 'App\\Controller\\PlanningRulesController::getPlanningsRules'], [], [['text', '/api/plannings']], [], [], []],
    'planning_id' => [['id'], ['_controller' => 'App\\Controller\\PlanningRulesController::getPlanningById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/plannings']], [], [], []],
    'app_plannings_post' => [['id'], ['_controller' => 'App\\Controller\\PlanningRulesController::createPlannings'], [], [['text', '/plannings'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/post/coachs']], [], [], []],
    'app_plannings_put' => [['id', 'idPlanning'], ['_controller' => 'App\\Controller\\PlanningRulesController::updatePlannings'], [], [['variable', '/', '[^/]++', 'idPlanning', true], ['text', '/plannings'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/coachs']], [], [], []],
    'delete_plannings' => [['id', 'idPlanning'], ['_controller' => 'App\\Controller\\PlanningRulesController::deletePlannings'], [], [['variable', '/', '[^/]++', 'idPlanning', true], ['text', '/plannings'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/coachs']], [], [], []],
    'app_resources' => [[], ['_controller' => 'App\\Controller\\ResourcesController::getRessources'], [], [['text', '/api/resources']], [], [], []],
    'resources_id' => [['id'], ['_controller' => 'App\\Controller\\ResourcesController::getResourcesById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/resources']], [], [], []],
    'app_resources_post' => [[], ['_controller' => 'App\\Controller\\ResourcesController::createPlans'], [], [['text', '/api/post/resources']], [], [], []],
    'app_resources_put' => [['id'], ['_controller' => 'App\\Controller\\ResourcesController::updateResources'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/resources']], [], [], []],
    'delete_resources' => [['id'], ['_controller' => 'App\\Controller\\ResourcesController::deleteResources'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/resources']], [], [], []],
    'app_schedules' => [[], ['_controller' => 'App\\Controller\\ScheduleController::getSchedules'], [], [['text', '/api/schedules']], [], [], []],
    'schedule_id' => [['id'], ['_controller' => 'App\\Controller\\ScheduleController::getScheduleById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/schedules']], [], [], []],
    'app_schedules_post' => [[], ['_controller' => 'App\\Controller\\ScheduleController::createSchedules'], [], [['text', '/api/post/schedules']], [], [], []],
    'app_schedules_put' => [['id'], ['_controller' => 'App\\Controller\\ScheduleController::updateSchedules'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/schedules']], [], [], []],
    'delete_schedules' => [['id'], ['_controller' => 'App\\Controller\\ScheduleController::deleteSchedules'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/schedules']], [], [], []],
    'app_text' => [[], ['_controller' => 'App\\Controller\\TextController::getText'], [], [['text', '/api/text']], [], [], []],
    'app_text_id' => [['id'], ['_controller' => 'App\\Controller\\TextController::getTextbyId'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/text']], [], [], []],
    'app_text_post' => [[], ['_controller' => 'App\\Controller\\TextController::createText'], [], [['text', '/api/post/text']], [], [], []],
    'app_text_put' => [['id'], ['_controller' => 'App\\Controller\\TextController::updateText'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/text']], [], [], []],
    'delete_text' => [['id'], ['_controller' => 'App\\Controller\\TextController::deleteText'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/delete/text']], [], [], []],
    'app_transactions' => [[], ['_controller' => 'App\\Controller\\TransactionController::getTransactions'], [], [['text', '/api/transactions']], [], [], []],
    'app_users' => [[], ['_controller' => 'App\\Controller\\UsersController::getUsers'], [], [['text', '/api/users']], [], [], []],
    'users_id' => [['id'], ['_controller' => 'App\\Controller\\UsersController::getUserById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/users']], [], [], []],
    'users_id_roles' => [['id'], ['_controller' => 'App\\Controller\\UsersController::getRoleById'], [], [['text', '/roles'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/users']], [], [], []],
    'app_users_post' => [[], ['_controller' => 'App\\Controller\\UsersController::createUsers'], [], [['text', '/api/post/users']], [], [], []],
    'app_users_put' => [['id'], ['_controller' => 'App\\Controller\\UsersController::updateUsers'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/put/users']], [], [], []],
    'app_users_delete' => [['id'], ['_controller' => 'App\\Controller\\UsersController::deleteUser'], [], [['text', '/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/users']], [], [], []],
    'api_login_check' => [[], [], [], [['text', '/api/login_check']], [], [], []],
];
