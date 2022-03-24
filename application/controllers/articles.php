<?php

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-article']))
{
    $user_id   = $_POST['userId'];
    $title     = trim($_POST['title']);
    $post      = trim($_POST['post']);
    $category  = $_POST['category'];
    $isApprove = $_POST['appr'];
    $slug      = slug($title);
    dd($slug);
}

function slug($title)
{
    $arr = [
        "а"=> "a",
        "б" => "b",
        "в" => "v",
        "г" => "g",
        "д" => "d",
        "е" => "e",
        "ё" => "io",
        "ж" => "zh",
        "з" => "z",
        "и" => "i",
        "к" => "k",
        "л" => "l",
        "м" => "m",
        "н" => "n",
        "о" => "o",
        "п" => "p",
        "р" => "r",
        "с" => "s",
        "т" => "t",
        "у" => "u",
        "ф" => "f",
        "х" => "h",
        "ц" => "c",
        "ч" => "ch",
        "ш" => "sh",
        "щ" => "sch",
        "ъ" => "q",
        "ы" => "ib",
        "ь" => "qi",
        "э" => "e",
        "ю" => "iu",
        "я" => "ya"
    ];

    $arrUpper = [
        'А' => 'A',
        'Б' => 'B',
        'В' => 'V',
        'Г' => 'G',
        'Д' => 'D',
        'Е' => 'E',
        'Ё' => 'IO',
        'Ж' => 'ZH',
        'З' => 'Z',
        'И' => 'I',
        'К' => 'K',
        'Л' => 'L',
        'М' => 'M',
        'Н' => 'N',
        'О' => 'O',
        'П' => 'P',
        'Р' => 'R',
        'С' => 'S',
        'Т' => 'T',
        'У' => 'U',
        'Ф' => 'F',
        'Х' => 'H',
        'Ц' => 'C',
        'Ч' => 'CH',
        'Ш' => 'SH',
        'Щ' => 'SCH',
        'Ъ' => 'Q',
        'Ы' => 'IB',
        'Ь' => 'QI',
        'Э' => 'E',
        'Ю' => 'IU',
        'Я' => 'YA',
        ' ' => '-'
    ];

    return strtr(strtr($title, $arr), $arrUpper);
}