<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/companys' => [[['_route' => 'get_all_companys', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::findAllCompanys'], null, ['GET' => 0], null, false, false, null]],
        '/api/company' => [
            [['_route' => 'app_rest_companyapi_addcompany', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::AddCompany'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_rest_companyapi_deletecompany', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::DeleteCompany'], null, ['DELETE' => 0], null, false, false, null],
            [['_route' => 'app_rest_companyapi_modifycompany', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::ModifyCompany'], null, ['PUT' => 0], null, false, false, null],
        ],
        '/api/users' => [[['_route' => 'get_all_users', '_controller' => 'App\\Controller\\Rest\\UserApiController::findAllUsers'], null, ['GET' => 0], null, false, false, null]],
        '/api/signup' => [[['_route' => 'app_rest_userapi_adduser', '_controller' => 'App\\Controller\\Rest\\UserApiController::AddUser'], null, ['POST' => 0], null, false, false, null]],
        '/api/login' => [[['_route' => 'app_rest_userapi_login', '_controller' => 'App\\Controller\\Rest\\UserApiController::Login'], null, ['POST' => 0], null, false, false, null]],
        '/api/delete' => [[['_route' => 'app_rest_userapi_deleteuser', '_controller' => 'App\\Controller\\Rest\\UserApiController::DeleteUser'], null, ['DELETE' => 0], null, false, false, null]],
        '/api/modify' => [[['_route' => 'app_rest_userapi_modifyuser', '_controller' => 'App\\Controller\\Rest\\UserApiController::ModifyUser'], null, ['PUT' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api(?'
                    .'|/(?'
                        .'|company/([^/]++)(*:69)'
                        .'|user/([^/]++)(*:89)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:125)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:156)'
                        .'|contexts/(.+)(?:\\.([^/]++))?(*:192)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        69 => [[['_route' => 'app_rest_companyapi_findcompanybyid', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::findCompanyById'], ['id'], ['GET' => 0], null, false, true, null]],
        89 => [[['_route' => 'app_rest_userapi_findusersbyid', '_controller' => 'App\\Controller\\Rest\\UserApiController::findUsersById'], ['id'], ['GET' => 0], null, false, true, null]],
        125 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        156 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        192 => [
            [['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
