<?php
// Инициализация переменных
$num1 = '';
$num2 = '';
$operator = '';
$result = '';

// Прием и обработка данных из формы методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получение и фильтрация данных
    $num1 = isset($_POST['num1']) ? (int) $_POST['num1'] : 0;
    $num2 = isset($_POST['num2']) ? (int) $_POST['num2'] : 0;
    $operator = isset($_POST['operator']) ? trim(strip_tags($_POST['operator'])) : '';
    
    // Проверка, что все данные пришли со значениями
    if ($operator !== '') {
        // Использование switch для математических операций
        switch ($operator) {
            case '+':
                $result = "Результат: {$num1} + {$num2} = " . ($num1 + $num2);
                break;
            case '-':
                $result = "Результат: {$num1} - {$num2} = " . ($num1 - $num2);
                break;
            case '*':
                $result = "Результат: {$num1} * {$num2} = " . ($num1 * $num2);
                break;
            case '/':
                // Проверка деления на ноль
                if ($num2 == 0) {
                    $result = "Ошибка: деление на ноль невозможно!";
                } else {
                    $result = "Результат: {$num1} / {$num2} = " . ($num1 / $num2);
                }
                break;
            default:
                // Обработка неверного оператора
                $result = "Ошибка: неверный оператор. Используйте: +, -, *, /";
                break;
        }
    } else {
        $result = "Ошибка: не указан оператор";
    }
    
    // Сохранение значений для отображения в форме
    $num1_display = htmlspecialchars($_POST['num1'] ?? '');
    $num2_display = htmlspecialchars($_POST['num2'] ?? '');
    $operator_display = htmlspecialchars($_POST['operator'] ?? '');
} else {
    $num1_display = '';
    $num2_display = '';
    $operator_display = '';
}
?>

<!-- Вывод результата перед формой -->
<?php if ($result !== ''): ?>
    <p><strong><?php echo $result; ?></strong></p>
<?php endif; ?>

<form action='<?= $_SERVER['REQUEST_URI'] ?>' method='POST'>
  <label>Число 1:</label>
  <br />
  <input name='num1' type='text' value="<?= $num1_display ?>" />
  <br />
  <label>Оператор: </label>
  <br />
  <input name='operator' type='text' value="<?= $operator_display ?>" />
  <br />
  <label>Число 2: </label>
  <br />
  <input name='num2' type='text' value="<?= $num2_display ?>" />
  <br />
  <br />
  <input type='submit' value='Считать'>
</form>
