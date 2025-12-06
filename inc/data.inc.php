<?php
setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');

$hour = (int) date('H') + 3;
$welcome = '';
if ($hour >= 0 && $hour < 6) {
    $welcome = 'Доброй ночи';
} elseif ($hour >= 6 && $hour < 12) {
    $welcome = 'Доброе утро';
} elseif ($hour >= 12 && $hour < 18) {
    $welcome = 'Добрый день';
} elseif ($hour >= 18 && $hour < 23) {
    $welcome = 'Добрый вечер';
} else {
    $welcome = 'Доброй ночи';
}

$arr = [
    'январь',
    'февраль',
    'март',
    'апрель',
    'май',
    'июнь',
    'июль',
    'август',
    'сентябрь',
    'октябрь',
    'ноябрь',
    'декабрь'
];

$day = date('d');
$mon = $arr[date('n') - 1];
$year = date('Y');

$leftMenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'index.php?id=about'],
    ['link' => 'Контакты', 'href' => 'index.php?id=contact'],
    ['link' => 'Таблица умножения', 'href' => 'index.php?id=table'],
    ['link' => 'Калькулятор', 'href' => 'index.php?id=calc']
];
?>
