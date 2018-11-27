<?php
define("PARAGRAPHPREPAGE", 5);//количество абзацев на страницу
$text = file('text_windows1251.txt');//считываем полный текст сразу в абзацы
$paragraphCount = count($text);//подсчитали количество абзацев
$pagesCount = ceil($paragraphCount / PARAGRAPHPREPAGE);
$pageNumber = 1;//принимаем 1 по умолчанию, если номер страницы не задан
if (isset($_GET['page'])) {
    $pageNumber = intval($_GET['page']);//перевод в формат целого числа
}
if ($pageNumber < 1 || $pageNumber > $pagesCount) {
    die('Страница не найдена');//если страница не существует, то конец скрипту, сообщение об ошибке
}
//echo $pageNumber, '<br>';
//echo $pagesCount;
$startNumber = ($pageNumber - 1) * PARAGRAPHPREPAGE;
$pageArray = array_slice($text, $startNumber, PARAGRAPHPREPAGE);
foreach ($pageArray as $paragraph) {
	$paragraph = mb_convert_encoding($paragraph, 'utf-8', 'windows-1251');
	echo $paragraph, '<br>';
}
for ($i = 1; $i <= $pagesCount; $i++) {//ссылки для перехода по страницам
	if ($i == $pageNumber) {
		echo $i, ' ';
	}
	else {
		echo "<a href=\"{$_SERVER['SCRIPT_NAME']}?page=$i\">$i</a> ";    
	}
}

exit();

