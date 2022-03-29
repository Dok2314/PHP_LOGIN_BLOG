<?php
use application\connect\Database;

$db = new Database();
$errMess        = '';
$oldTitle       = '';
$oldDescription = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-category'])) {
    $title       = trim($_POST['title']);
    $description = trim($_POST['description']);
    $slug        = slug($title);

    if(empty($title) && empty($description)) {
        $errMess = 'Заполните поля!';
    }elseif(empty($title)) {
        $errMess = 'Поле название должно быть заполнено!';
    }elseif(empty($description)) {
        $errMess = 'Поле описание должно быть заполнено!';
    }elseif(mb_strlen($title) < 4) {
        $errMess = 'Поле название должно быть не короче 4 символов!';
    }elseif(mb_strlen($description) < 6) {
        $errMess = 'Поле название должно быть не короче 6 символов!';
    }

    $oldTitle = $title;
    $oldDescription = $description;

    if(empty($errMess)){

        $category = [
            'title'       => $title,
            'slug'        => $slug,
            'description' => $description,
        ];

        $db->insert('categories', $category);
        header('Location: /category.php?slug=' . $slug);
    }
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