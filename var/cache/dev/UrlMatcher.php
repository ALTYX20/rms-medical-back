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
        '/api/equips' => [[['_route' => 'get_all_equips', '_controller' => 'App\\Controller\\Rest\\EquipApiController::findAllEquips'], null, ['GET' => 0], null, false, false, null]],
        '/api/equip' => [
            [['_route' => 'add_equip', '_controller' => 'App\\Controller\\Rest\\EquipApiController::AddEquip'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_rest_equipapi_deleteequip', '_controller' => 'App\\Controller\\Rest\\EquipApiController::DeleteEquip'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/logs' => [[['_route' => 'get_all_logs', '_controller' => 'App\\Controller\\Rest\\LogApiController::findAlllogs'], null, ['GET' => 0], null, false, false, null]],
        '/api/media' => [
            [['_route' => 'get_all_medias', '_controller' => 'App\\Controller\\Rest\\MediaApiController::findAllMedia'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_rest_mediaapi_addmedia', '_controller' => 'App\\Controller\\Rest\\MediaApiController::AddMedia'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_rest_mediaapi_modifymedia', '_controller' => 'App\\Controller\\Rest\\MediaApiController::ModifyMedia'], null, ['PUT' => 0], null, false, false, null],
            [['_route' => 'app_rest_mediaapi_deletemedia', '_controller' => 'App\\Controller\\Rest\\MediaApiController::DeleteMedia'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/presentation' => [
            [['_route' => 'get_all_presentation', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::findAllPresentation'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_rest_presentationapi_addpresentation', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::AddPresentation'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_rest_presentationapi_modifyproject', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::ModifyProject'], null, ['PUT' => 0], null, false, false, null],
            [['_route' => 'app_rest_presentationapi_deletepresentation', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::DeletePresentation'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/product' => [
            [['_route' => 'get_all_products', '_controller' => 'App\\Controller\\Rest\\ProductApiController::findAllProduct'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_rest_productapi_addproduct', '_controller' => 'App\\Controller\\Rest\\ProductApiController::AddProduct'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_rest_productapi_modifyuser', '_controller' => 'App\\Controller\\Rest\\ProductApiController::ModifyUser'], null, ['PUT' => 0], null, false, false, null],
            [['_route' => 'app_rest_productapi_deleteproduct', '_controller' => 'App\\Controller\\Rest\\ProductApiController::DeleteProduct'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/project' => [
            [['_route' => 'get_all_projects', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::findAllProject'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_rest_projectapi_addproject', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::AddProject'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_rest_projectapi_modifyproject', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::ModifyProject'], null, ['PUT' => 0], null, false, false, null],
            [['_route' => 'app_rest_projectapi_deleteproject', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::DeleteProject'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/referance' => [
            [['_route' => 'get_all_referances', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::findAllReferance'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_rest_referanceapi_addreferance', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::AddReferance'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_rest_referanceapi_modifyreferance', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::ModifyReferance'], null, ['PUT' => 0], null, false, false, null],
            [['_route' => 'app_rest_referanceapi_deletereferance', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::DeleteReferance'], null, ['DELETE' => 0], null, false, false, null],
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
                        .'|equip/([^/]++)(?'
                            .'|(*:93)'
                            .'|/(?'
                                .'|members(*:111)'
                                .'|addMembers(*:129)'
                                .'|removeMembers(*:150)'
                            .')'
                        .')'
                        .'|log/([^/]++)(*:172)'
                        .'|media/([^/]++)(*:194)'
                        .'|pr(?'
                            .'|esentation/([^/]++)(?'
                                .'|(*:229)'
                            .')'
                            .'|o(?'
                                .'|duct/([^/]++)(*:255)'
                                .'|ject/([^/]++)(*:276)'
                            .')'
                        .')'
                        .'|referance/([^/]++)(*:304)'
                        .'|user/([^/]++)(*:325)'
                        .'|delete/([^/]++)(*:348)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:385)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:416)'
                        .'|contexts/(.+)(?:\\.([^/]++))?(*:452)'
                        .'|equips(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:487)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:525)'
                            .')'
                        .')'
                        .'|logs(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:560)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:598)'
                            .')'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        69 => [[['_route' => 'app_rest_companyapi_findcompanybyid', '_controller' => 'App\\Controller\\Rest\\CompanyApiController::findCompanyById'], ['id'], ['GET' => 0], null, false, true, null]],
        93 => [[['_route' => 'app_rest_equipapi_findequipbyid', '_controller' => 'App\\Controller\\Rest\\EquipApiController::findEquipById'], ['id'], ['GET' => 0], null, false, true, null]],
        111 => [[['_route' => 'app_rest_equipapi_showmembers', '_controller' => 'App\\Controller\\Rest\\EquipApiController::showMembers'], ['id'], ['GET' => 0], null, false, false, null]],
        129 => [[['_route' => 'app_rest_equipapi_addmembers', '_controller' => 'App\\Controller\\Rest\\EquipApiController::addMembers'], ['id'], ['POST' => 0], null, false, false, null]],
        150 => [[['_route' => 'app_rest_equipapi_removemembers', '_controller' => 'App\\Controller\\Rest\\EquipApiController::removeMembers'], ['id'], ['POST' => 0], null, false, false, null]],
        172 => [[['_route' => 'app_rest_logapi_finduserlog', '_controller' => 'App\\Controller\\Rest\\LogApiController::findUserLog'], ['id'], ['GET' => 0], null, false, true, null]],
        194 => [[['_route' => 'app_rest_mediaapi_findmediabyid', '_controller' => 'App\\Controller\\Rest\\MediaApiController::findMediaById'], ['id'], ['GET' => 0], null, false, true, null]],
        229 => [
            [['_route' => 'app_rest_presentationapi_findpresentationbyid', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::findPresentationById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_rest_presentationapi_deletepresentationwithid', '_controller' => 'App\\Controller\\Rest\\PresentationApiController::DeletePresentationWithId'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        255 => [[['_route' => 'app_rest_productapi_findproductbyid', '_controller' => 'App\\Controller\\Rest\\ProductApiController::findProductById'], ['id'], ['GET' => 0], null, false, true, null]],
        276 => [[['_route' => 'app_rest_projectapi_findprojectbyid', '_controller' => 'App\\Controller\\Rest\\ProjectApiController::findProjectById'], ['id'], ['GET' => 0], null, false, true, null]],
        304 => [[['_route' => 'app_rest_referanceapi_findreferancebyid', '_controller' => 'App\\Controller\\Rest\\ReferanceApiController::findReferanceById'], ['id'], ['GET' => 0], null, false, true, null]],
        325 => [[['_route' => 'app_rest_userapi_findusersbyid', '_controller' => 'App\\Controller\\Rest\\UserApiController::findUsersById'], ['id'], ['GET' => 0], null, false, true, null]],
        348 => [[['_route' => 'app_rest_userapi_deleteuserwithid', '_controller' => 'App\\Controller\\Rest\\UserApiController::DeleteUserWithId'], ['id'], ['DELETE' => 0], null, false, true, null]],
        385 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        416 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        452 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        487 => [
            [['_route' => 'api_equips_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_equips_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        525 => [
            [['_route' => 'api_equips_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_equips_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_equips_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_equips_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Equip', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        560 => [
            [['_route' => 'api_logs_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_logs_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        598 => [
            [['_route' => 'api_logs_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_logs_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_logs_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_logs_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Log', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
