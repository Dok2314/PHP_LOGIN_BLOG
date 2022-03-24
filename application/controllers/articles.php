<?php
use application\connect\Database;

$db = new Database();
$errMess   = '';
$oldTitle  = '';
$oldPost   = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-article']))
{
    $user_id   = $_SESSION['id'];
    $title     = trim($_POST['title']);
    $post      = trim($_POST['post']);
    $category  = $_POST['category'];
    $img       = $_FILES['img'] ?? null;
    $isApproved = $_POST['appr'];
    $slug      = slug($title);

    $oldTitle  = $title;
    $oldPost   = $post;

    if(empty($title) || empty($post)){
        $errMess = 'Не все поля заполнены!';
    }elseif(mb_strlen($title) < 2){
        $errMess = 'Поле Название должно содержать больше 2 символов!';
    }elseif(mb_strlen($post) < 5){
        $errMess = 'Поле Статья должно содержать больше 5 символов!';
    }elseif(empty($img['tmp_name'])){
        $errMess = 'Вы не загрузили картинку!';
    }elseif(isset($img)){
        if($img['size'] > 1024 * 10 * 10){
            $errMess = 'Файл должен быть меньше 10Мб!';
        }
    }

    if (empty($errMess)) {
        $filename = uniqid() . '-' . $img['name'];
        move_uploaded_file($img['tmp_name'], APP_ROOT . 'uploads/' . $filename);
        $article = [
            'user_id'     => $user_id,
            'category_id' => $category,
            'title'       => $title,
            'slug'        => $slug,
            'post'        => $post,
            'img'         => $filename,
            'approved'    => $isApproved
        ];
        $db->insert('posts', $article);
        header('Location: /article.php?slug=' . $slug);
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