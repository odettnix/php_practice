<?php
// Инициализация переменных значениями по умолчанию
$cols = 10;
$rows = 10;
$color = 'yellow';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cols = abs((int) $_POST['cols']);
    $rows = abs((int) $_POST['rows']);
    $color = trim(strip_tags($_POST['color']));
}

// Установка значений по умолчанию, если они пустые
$cols = ($cols) ? $cols : 10;
$rows = ($rows) ? $rows : 10;
$color = ($color) ? $color : 'yellow';
?>

<!-- Область основного контента -->
<form action='<?= $_SERVER['REQUEST_URI']?>' method="POST">
  <label>Количество колонок: </label>
  <br />
  <input name='cols' type='text' value="<?= htmlspecialchars($cols) ?>" />
  <br />
  <label>Количество строк: </label>
  <br />
  <input name='rows' type='text' value="<?= htmlspecialchars($rows) ?>" />
  <br />
  <label>Цвет: </label>
  <br />
  <input name='color' type='text' value="<?= htmlspecialchars($color) ?>" />
  <br />
  <br />
  <input type='submit' value='Создать' />
</form>
<!-- Таблица -->
<?php drawTable($cols, $rows, $color); ?>
<!-- Таблица -->