<?php

return [

    /*
    | الـ routes اللي بيطبّق عليها CORS: بس الـ API
    */
    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    /*
    | الـ origins المسموحة. من .env حتى نغيّرها بالإنتاج بدون تعديل الكود.
    | ما منستخدم '*' لأنه بيسمح لأي موقع بالدنيا يقرأ الـ API من متصفح المستخدم.
    */
    'allowed_origins' => array_filter(explode(',', env('CORS_ALLOWED_ORIGINS', 'http://localhost:4200'))),

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    /*
    | false هلأ لأن طلباتنا عامة (GET بدون cookies).
    | لما نوصل لتسجيل دخول الأدمن بـ Sanctum (SPA cookies) بتصير true.
    */
    'supports_credentials' => false,

];
