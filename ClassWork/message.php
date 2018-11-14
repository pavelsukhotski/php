<?php
//постраничный вывод сообщений -- n=100&page=1 - это введено в адресной строке после ?
define('MP', 10); //number of messages on a page
$n = isset($_GET['n'])?intval($_GET['n']):100; //100 как-будто бы количество сообщений на страницу по умолчанию
$page = isset($_GET['page'])?intval($_GET['page']):2;
for ($i = 1; $i <= $n; $i++) {
    $array[] = 'Сообщение '.$i;
}
$firstElement = ($page - 1) * MP;
$pageArray = array_slice($array, $firstElement, MP); //извлечение информации из массива для вывода на одну страницу
foreach ($pageArray as $value) {
    echo "$value<br/>";
}