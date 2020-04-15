<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/login_check' => [[['_route' => 'Api_login_check'], null, ['POST' => 0], null, false, false, null]],
        '/api/token/refresh' => [[['_route' => 'gesdinet_jwt_refresh_token', '_controller' => 'gesdinet.jwtrefreshtoken::refresh'], null, ['POST' => 0], null, false, false, null]],
        '/api/company' => [
            [['_route' => 'get_all_companys', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::findAllCompanys'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_rest_companyapi_addcompany', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::AddCompany'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/equip' => [
            [['_route' => 'get_all_equips', '_controller' => 'App\\Controller\\Rest\\EquipApiController::findAllEquips'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'add_equip', '_controller' => 'App\\Controller\\Rest\\EquipApiController::AddEquip'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/media' => [
            [['_route' => 'get_all_medias', '_controller' => 'App\\Controller\\Rest\\MediaApiController::findAllMedia'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'add_Media', '_controller' => 'App\\Controller\\Rest\\MediaApiController::AddMedia'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/presentation' => [
            [['_route' => 'get_all_presentation', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::findAllPresentation'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'add_Presentation', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::AddPresentation'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/product' => [
            [['_route' => 'get_all_products', '_controller' => 'App\\Controller\\Rest\\ProductApiController::findAllProduct'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_rest_productapi_addproduct', '_controller' => 'App\\Controller\\Rest\\ProductApiController::AddProduct'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/project' => [
            [['_route' => 'get_all_projects', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::findAllProject'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'add_project', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::AddProject'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/referance' => [
            [['_route' => 'get_all_referances', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::findAllReferance'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'add_referenc', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::AddReferance'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/users' => [[['_route' => 'get_all_users', '_controller' => 'App\\Controller\\Rest\\UserApiController::findAllUsers'], null, ['GET' => 0], null, false, false, null]],
        '/api/signup' => [[['_route' => 'add_user', '_controller' => 'App\\Controller\\Rest\\UserApiController::AddUser'], null, ['POST' => 0], null, false, false, null]],
        '/api/login' => [[['_route' => 'user_login', '_controller' => 'App\\Controller\\Rest\\UserApiController::Login'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api(?'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:77)'
                    .'|/(?'
                        .'|d(?'
                            .'|ocs(?:\\.([^/]++))?(*:110)'
                            .'|elete/([^/]++)(*:132)'
                        .')'
                        .'|co(?'
                            .'|ntexts/(.+)(?:\\.([^/]++))?(*:172)'
                            .'|mpany/([^/]++)(?'
                                .'|(*:197)'
                            .')'
                        .')'
                        .'|equip(?'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:237)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:275)'
                                .')'
                            .')'
                            .'|/([^/]++)(?'
                                .'|(*:297)'
                                .'|/(?'
                                    .'|members(*:316)'
                                    .'|addMembers(*:334)'
                                    .'|removeMembers(*:355)'
                                .')'
                            .')'
                        .')'
                        .'|log(?'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:394)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:432)'
                                .')'
                                .'|(*:441)'
                            .')'
                            .'|/([^/]++)(*:459)'
                        .')'
                        .'|media/([^/]++)(?'
                            .'|(*:485)'
                            .'|/upload(*:500)'
                            .'|(*:508)'
                        .')'
                        .'|pr(?'
                            .'|esentation/([^/]++)(?'
                                .'|(*:544)'
                            .')'
                            .'|o(?'
                                .'|duct/([^/]++)(?'
                                    .'|(*:573)'
                                .')'
                                .'|ject/([^/]++)(?'
                                    .'|(*:598)'
                                .')'
                            .')'
                        .')'
                        .'|referance/([^/]++)(?'
                            .'|(*:630)'
                        .')'
                        .'|user/([^/]++)(?'
                            .'|(*:655)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        77 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        110 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        132 => [[['_route' => 'Delete_user', '_controller' => 'App\\Controller\\Rest\\UserApiController::DeleteUserWithId'], ['id'], ['DELETE' => 0], null, false, true, null]],
        172 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        197 => [
            [['_route' => 'Get_company_byId', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::findCompanyById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'Delete_Company', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::DeleteCompany'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'Modify_Company', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::ModifyCompany'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        237 => [
            [['_route' => 'api_equips_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_equips_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        275 => [
            [['_route' => 'api_equips_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_equips_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_equips_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_equips_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        297 => [
            [['_route' => 'get_equip_byId', '_controller' => 'App\\Controller\\Rest\\EquipApiController::findEquipById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'Delete_equip', '_controller' => 'App\\Controller\\Rest\\EquipApiController::DeleteEquip'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        316 => [[['_route' => 'app_rest_equipapi_showmembers', '_controller' => 'App\\Controller\\Rest\\EquipApiController::showMembers'], ['id'], ['GET' => 0], null, false, false, null]],
        334 => [[['_route' => 'app_rest_equipapi_addmembers', '_controller' => 'App\\Controller\\Rest\\EquipApiController::addMembers'], ['id'], ['POST' => 0], null, false, false, null]],
        355 => [[['_route' => 'app_rest_equipapi_removemembers', '_controller' => 'App\\Controller\\Rest\\EquipApiController::removeMembers'], ['id'], ['POST' => 0], null, false, false, null]],
        394 => [
            [['_route' => 'api_logs_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_logs_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        432 => [
            [['_route' => 'api_logs_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_logs_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_logs_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_logs_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        441 => [[['_route' => 'get_all_logs', '_controller' => 'App\\Controller\\Rest\\LogApiController::findAlllogs'], [], ['GET' => 0], null, false, false, null]],
        459 => [[['_route' => 'app_rest_logapi_finduserlog', '_controller' => 'App\\Controller\\Rest\\LogApiController::findUserLog'], ['id'], ['GET' => 0], null, false, true, null]],
        485 => [[['_route' => 'Get_Media_byId', '_controller' => 'App\\Controller\\Rest\\MediaApiController::findMediaById'], ['id'], ['GET' => 0], null, false, true, null]],
        500 => [[['_route' => 'Upload_Media', '_controller' => 'App\\Controller\\Rest\\MediaApiController::UploadMedia'], ['id'], ['POST' => 0], null, false, false, null]],
        508 => [
            [['_route' => 'Modify_media', '_controller' => 'App\\Controller\\Rest\\MediaApiController::ModifyMedia'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'Delete_media', '_controller' => 'App\\Controller\\Rest\\MediaApiController::DeleteMedia'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        544 => [
            [['_route' => 'Get_Presentation_byId', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::findPresentationById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'Modify_Presentation', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::ModifyPresentation'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'delete_presentatio', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::DeletePresentationWithId'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        573 => [
            [['_route' => 'app_rest_productapi_findproductbyid', '_controller' => 'App\\Controller\\Rest\\ProductApiController::findProductById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'Modify_product', '_controller' => 'App\\Controller\\Rest\\ProductApiController::ModifyUser'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'Delete_product', '_controller' => 'App\\Controller\\Rest\\ProductApiController::DeleteProduct'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        598 => [
            [['_route' => 'app_rest_projectapi_findprojectbyid', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::findProjectById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'modify_project', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::ModifyProject'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'Delete_project', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::DeleteProject'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        630 => [
            [['_route' => 'app_rest_referanceapi_findreferancebyid', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::findReferanceById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'Modify_reference', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::ModifyReferance'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'Delete_Reference', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::DeleteReferance'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        655 => [
            [['_route' => 'app_rest_userapi_findusersbyid', '_controller' => 'App\\Controller\\Rest\\UserApiController::findUsersById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'Modify_user', '_controller' => 'App\\Controller\\Rest\\UserApiController::ModifyUser'], ['id'], ['PUT' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
