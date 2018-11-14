<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <style>
        .b0 {background-color: white;}
        .b1 {background-color: grey;}
        th, td, table {
            text-align: center;
            border-collapse: collapse;
            border: 1px solid black;}
            th, td {
            width: 70px;
            }
    </style>
<body>
    <table>
        <tr>
            <th>Номер<br>п/п</th>
            <th>Число</th>
        </tr>
        <?php
        $s = 10; //количество строк
        for ($i = 1; $i <= $s; $i++)
        {
            $j = $i % 2; //определение используемого класса оформления строки
            echo '<tr class="b'.$j.'">';
            echo '<td>'.$i.'</td>';
            echo '<td>'.mt_rand(0, 100).'</td>';
            echo '</tr>';
        }
        ?>      
    </table>
    <br><br>
    <table>
        <tr>
            <th>Номер<br>п/п</th>
            <?php $n=5; ?> <!-- количество столбцов чисел-->
            <th colspan="<?=$n;?>">Число</th>
        </tr>
        <?php
        $s = 10; //количество строк
        
        for ($i = 1; $i <= $s; $i++)
        {
            $j = $i % 2; //определение используемого класса оформления строки
            
            echo '<tr class="b'.$j.'">';
            echo '<td>'.$i.'</td>';
                for ($k = 1; $k <= $n; $k++)
                {
                echo '<td>'.mt_rand(0, 100).'</td>';
                }
            echo '</tr>';
        }
        ?>      
    </table>
    <br><br>
    <table>
        <tr>
            <th>Номер<br>п/п</th>
            <th>Число</th>
        </tr>
        <?php
        $s = 10; //количество строк
        for ($i = 0; $i <= $s - 1; $i++) //i - номер текущей строки
        {
            $i1 = $i + 1;
            $d = 255 / ($s - 1);
            $color = round(255 - $i * $d); //цвет строки
            $textColor = round(0 + $i * $d); //цвет текста
            echo '<tr style="background-color: rgb('.$color.', '.$color.', '.$color.'); color: rgb('.$textColor.', '.$textColor.', '.$textColor.');">';
            echo '<td>'.$i1.'</td>';
            echo '<td>'.mt_rand(0, 100).'</td>';
           
            echo '</tr>';
        }
        ?>      
    </table>
</body>
</html>