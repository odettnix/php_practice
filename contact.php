<?php
// Получаем значение директивы post_max_size
$postMaxSize = ini_get("post_max_size");

// Получаем числовое значение (убираем единицы измерения)
$numericValue = (int) $postMaxSize;

// Получаем единицу измерения (последний символ строки)
$unit = strtoupper(substr($postMaxSize, -1));

// Используем switch для преобразования в байты
switch ($unit) {
    case 'K':
        $size = $numericValue * 1024;
        break;
    case 'M':
        $size = $numericValue * 1024 * 1024;
        break;
    case 'G':
        $size = $numericValue * 1024 * 1024 * 1024;
        break;
    default:
        // Если единица не указана, значение уже в байтах
        $size = $numericValue;
        break;
}
?>
<h3>Адрес</h3>
<p>123456 Москва, Малый Американский переулок 21</p>
<h3>Задайте вопрос</h3>
<form action='' method='post'>
  <label>Тема письма: </label>
  <br />
  <input name='subject' type='text' size="50" />
  <br />
  <label>Содержание: </label>
  <br />
  <textarea name='body' cols="50" rows="10"></textarea>
  <br />
  <br />
  <input type='submit' value='Отправить' />
</form>
<p>Максимальный размер отправляемых данных <?= $size ?> байт.</p>