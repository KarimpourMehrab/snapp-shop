<?php

function standardiseCharactersAndNumbers($string): array|string
{
    /**
     * Only English numbers is accepted
     */
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩',];

    $latin_numeric = str_replace(
        $arabic,
        range(0, 9),
        str_replace($persian, range(0, 9), $string)
    );

    /**
     * Convert Arabic Characters to Farsi
     */
    $characters = [
        'ك' => 'ک',
        'دِ' => 'د',
        'بِ' => 'ب',
        'زِ' => 'ز',
        'ذِ' => 'ذ',
        'شِ' => 'ش',
        'سِ' => 'س',
        'ى' => 'ی',
        'ي' => 'ی',
    ];

    return str_replace(array_keys($characters), array_values($characters), $latin_numeric);
}
