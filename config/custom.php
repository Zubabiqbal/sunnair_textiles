<?php

return [
    'phone' => env('APP_PHONE', '+92-313-7888991'),

    'email' => env('APP_EMAIL', 'info@sunnairtextiles.com'),
    // contact us info
    'contact_us_email' => env('CONTACT_US_EMAIL', 'sunnair.contact.us@gmail.com'),
    'contact_us_cc_email' => env('CONTACT_US_CC_EMAIL', 'nomanbutt8322@gmail.com'),



    'address' => env('APP_ADDRESS', '200 R.B Lathiyanwala road, Gatwala Faisalabad'),

    'copy_right' => env('APP_COPY_RIGHT', 'Sunnair Textile'),

    'website' => env('APP_WEBSITE', 'https://www.sunnairtextiles.com'),

    'disclaimer_message' => env('DISCLAIMER_MESSAGE', 'Cotton Cloth Grey, Cotton Cloth White, Cotton Cloth Dyed, Cotton Cloth Printed, Polycotton Cloth Grey, Polycotton Cloth White, Polycotton Cloth Dyed, Polycotton Printed, Bedsheets, Pillow Cases, Quilt Covers, Fitted Sheets, Valance Sheets, Pillow Ticks, Cushion Ticks'),

    'CATEGORIES_PER_PAGE' => env('CATEGORIES_PER_PAGE', 5),

    'ACTIVE_PAGES_PER_PAGE' => env('ACTIVE_PAGES_PER_PAGE', 10),

    'IN_ACTIVE_PAGES_PER_PAGE' => env('IN_ACTIVE_PAGES_PER_PAGE', 10),



    'product_image' => ['width' => 644, 'height' => 420, 'max' => 1024],

    'slider_image' => ['width' => 1080, 'height' => 422, 'max' => 1024],

    'social' => [
        'google' => [
            'link' => 'https://plus.google.com/107338108473979376223',
            'enable' => 1,
        ],
        'twitter' =>[
            'link' =>'https://twitter.com/Sunnairtextiles',
            'enable' => 1,
        ],
        'facebook' => [
            'link' => 'https://www.facebook.com/sunnairtextile/',
            'enable' => 1,
        ],
    ]

];
