<?php
//пузырьковый метод сортировки массива
$array = [8, 3, 1, 1, 0, 7, 9];
$n = count($array);
for ($i = 0; $i < $n-1; $i++) {
    $counter = 0;
    for ($j = $n-1; $j > $i; $j--) {
        if ($array[$j] < $array[$j-1]) {
            $temp = $array[$j];
            $array[$j] = $array[$j-1];
            $array[$j-1] = $temp;
            $counter++;
        } 
    }
    if ($counter == 0) {
        //echo '<br/>Нет перестановок';
        break;
    }
//var_dump($array);
}
foreach ($array as $value) {
    echo "$value<br/>";
}

