<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <style>
        .b1 {background-color: white;}
        .b0 {background-color: grey;}
        th, td, table {
            text-align: center;
            border-collapse: collapse;
            border: 1px solid black;}
        th, td {
            width: 72px;
            }
        th {background-color: grey;}
        table {width: 360px}
    </style>
<body>
    <p><strong><em>Задание 1.</em></strong> Cкрипт, выводящий квадраты и кубы чисел от 2 до n</p>
    <table>
        <tr>
            <th>Число</th>
            <th>Квадрат числа</th>
            <th>Куб числа</th>
        </tr>
        <?php
        $n = 8; //заданное число
        for ($i = 2; $i <= $n; $i++) {
            echo '<tr class="b'.$j.'">';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$i*$i.'</td>';
            echo '<td>'.($i**3).'</td>';
            echo '</tr>';
        }
        ?>      
    </table>
    <br><br>
    <p><strong><em>Задание 2.</em></strong> Вывести целые числа от 1 до n в таблице из 5 колонок в следующем виде (например, при n=18)</p>
    <p>a)</p>
    <table>
        <?php
        $k = 1; //число в ячейке
        $n = 21;
        for ($i=1; $i <= ceil($n/5); $i++) { //количество строк
            echo '<tr class="b'.($i%2).'">';  //определение стиля строки
            if ($k <= $n) {
                for ($j = 1; $j <= 5; $j++) { //количество колонок 
                    echo "<td>$k</td>";
                    $k++; 
                    if ($k > $n && ($n%5) != 0) { //пустые ячейки
                        for ($a=1; $a <= (5-$n%5); $a++) { 
                            echo "<td></td>";
                        }
                    break;
                    } 
                }
            }
            echo '</tr>';
        }
        ?>
    </table>
    <p>b)</p>
    <table>
        <?php
   
        $n = 21;
        $str = ceil($n / 5); //количество строк
        for ($i=1; $i <= $str; $i++) { //номер строки
            echo '<tr class="b'.($i%2).'">';  //определение стиля строки
            echo "<td>$i</td>";
            $k = $i;  //число в ячейке
            for ($j = 1; $j <= 4; $j++) { //количество колонок 
                $k += $str;
                echo "<td>".$k."</td>";
                if (($k + $str) > $n && $j < 4) {
                    for ($a=1; $a <= (4-$j); $a++) { //пустые ячейки
                        echo "<td></td>";
                    }
                    $j = 5;
                } 
            }
            echo '</tr>';
        }
        ?>
    </table>
    <br><br>
    <p><strong><em>Задание 3.</em></strong> Скрипт, который вычисляет и выводит сумму вклада по ежегодному и
ежемесячному начислению процентов через 1, 2 , 3, … n лет.</p>
    <table>
        
        <tr>
            <th>Годы</th>
            <th>Ежегодная капитализация</th>
            <th>Ежемесячная капитализация</th>
        </tr>
        <?php
        $s = 100; //сумма вклада
        $n = 7; //количество лет вклада
        $p = 10; //процентная годовая ставка
        $annual = $s; //сумма ежегодная
        $monthly = $s; //сумма ежемесячная
        for ($i=1; $i <= $n; $i++) { 
            echo "<tr>";
            $annual += $annual * $p / 100;
            for ($j = 1; $j <= 12; $j++) {
            $monthly += $monthly * $p / 12 / 100;
            }
            echo "<td>$i</td><td>$annual</td><td>$monthly</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <p>Сумма вклада: <?=$s?>; процентная ставка <?=$p?>% годовых</p>
</body>
</html>