<?php
function drawTable($cols, $rows, $color)
{
    echo "<table border='1' width='200'>";
    $i = 1;
    do {
        echo "<tr>";
        $j = 1;
        do {
            $result = $i * $j;
            if ($i == 1 || $j == 1) {
                echo "<td align='center' style='background-color: {$color};'><strong>{$result}</strong></td>";
            } else {
                echo "<td>{$result}</td>";
            }
            $j++;
        } while ($j <= $cols);
        echo "</tr>";
        $i++;
    } while ($i <= $rows);
    echo "</table>";
}

function drawMenu(array $menu, bool $vertical = true)
{
    $listStyle = '';
    $itemStyle = '';

    if (!$vertical) {
        $listStyle = " style='display:flex; gap:10px; list-style:none; padding:0; margin:0;'";
        $itemStyle = " style='display:inline;'";
    }

    echo "<ul{$listStyle}>";
    foreach ($menu as $item) {
        echo "<li{$itemStyle}><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo "</ul>";
}
?>
