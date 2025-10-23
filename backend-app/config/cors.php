<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | إعدادات CORS تتيح لتطبيقات الويب من أصول مختلفة بالوصول إلى API الخاص بك.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // اسمح بكل أنواع الطلبات (GET, POST, PUT, DELETE, إلخ)
    'allowed_methods' => ['*'],

    // اسمح فقط لواجهة الريأكت بالوصول (تغيير * إلى localhost:3000 في بيئة التطوير)
    'allowed_origins' => ['http://localhost:3000'],

    'allowed_origins_patterns' => [],

    // اسمح بجميع الهيدرات القادمة من العميل
    'allowed_headers' => ['*'],

    // الهيدرات التي يمكن الوصول لها من الطرف العميل
    'exposed_headers' => [],

    // عدد الثواني التي يمكن للمتصفح تخزين إعدادات CORS قبل إعادة الطلب
    'max_age' => 0,

    // هل تسمح بإرسال الكوكيز أو Authorization header؟ (في حال استخدمت JWT أو cookies)
    'supports_credentials' => false,

];
