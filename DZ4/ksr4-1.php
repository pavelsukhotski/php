<?php
define("PARAGRAPHPREPAGE", 10);//количество абзацев на страницу
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
$startNumber = ($pageNumber - 1) * PARAGRAPHPREPAGE;
$pageArray = array_slice($text, $startNumber, PARAGRAPHPREPAGE);
foreach ($pageArray as $paragraph) {
	$paragraph = mb_convert_encoding($paragraph, 'utf-8', 'windows-1251');
	echo textFormat($paragraph), '<br>';
}
for ($i = 1; $i <= $pagesCount; $i++) {//ссылки для перехода по страницам
	if ($i == $pageNumber) {
		echo $i, ' ';
	}
	else {
		echo "<a href=\"{$_SERVER['SCRIPT_NAME']}?page=$i\">$i</a> ";    
	}
}


function textFormat($paragraph) {
	$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя';
	$alphabetArray = mbStringToArray($alphabet, 0);
	$alphabetArrayLength = count($alphabetArray);

	$sentenceArray = explode('. ', $paragraph);//разбиваем каждый абзац на предложения по признаку точка-пробел
		
	$word = explode(" ", $paragraph);//массив слов в каждом абзаце
	        
	foreach ($word as &$value) {
	    $value = str_ireplace(["HTML", "PHP", "ASP.NET", "ASP", "Java"], ['<span style="color: blue">'.color_text("html", $value).'</span>', '<span style="color: blue">'.color_text("php", $value).'</span>', '<span style="color: blue">'.color_text("asp.net", $value).'</span>', '<span style="color: blue">'.color_text("asp", $value).'</span>', '<span style="color: blue">'.color_text("java", $value).'</span>'], $value);
	}
	$paragraph = implode(' ', $word);//собираем из массива слов абзац
	$sentenceArray = explode('. ', $paragraph);//разбиваем каждый абзац на предложения по признаку точка-пробел

	foreach ($sentenceArray as &$sentence) {
	    $charArray = mbStringToArray($sentence, 0);//преобразуем каждое предложение в массив символов
	    if (in_array($charArray[0], $alphabetArray)) {
	    	$charArray[0] = "<b>$charArray[0]</b>";//если первый символ буква, то заменяем ее на жирную эту же букву
	    }
		elseif ($charArray[0] != '<') {//если первый символ не буква и не начало тэга, то ищем первую букву
			$charCounter = 0;
			for ($charK = 1; ($charK < count($charArray)) && ($charCounter == 0); $charK++) {
				if (in_array($charArray[$charK], $alphabetArray)) {
					$charArray[$charK] = "<b>$charArray[$charK]</b>";
					$charCounter++;
				}
			}
		}
	    else {//если первый символ начало тэга, то ищем закрытие тэга и первую букву за ним
	    	$charCounter = 0;
	    	for ($char = 1; ($char < count($charArray)) && ($charCounter == 0); $char++) {
	    		if ($charArray[$char] == '>' && $charArray[$char + 1] != '<') {
	    			//проверяем есть ли за первым тэгом еще один тэг
	    			for ($charK = ($char + 1); ($charK < count($charArray)) && ($charCounter == 0); $charK++) {
	    				if (in_array($charArray[$charK], $alphabetArray)) {
	    					$charArray[$charK] = "<b>$charArray[$charK]</b>";
	    					$charCounter++;
	    				}
	    			}
	    		}
	    		elseif ($charArray[$char] == '>' && $charArray[$char + 1] == '<') {
	    			$charJ = $char + 2;
	    			if ($charArray[$charJ] == '>') {
	    				for ($charK = ($charJ + 1); ($charK < count($charArray)) && ($charCounter == 0); $charK++) {
	    					if (in_array($charArray[$charK], $alphabetArray)) {
	    						$charArray[$charK] = "<b>$charArray[$charK]</b>";
	    						$charCounter++;
	    					}
	    				}
	    			}
	    		}
	    	}
	    }
	}
	$sentence = implode($charArray);
	$paragraph = implode('. ', $sentenceArray);
	return $paragraph;
}

function mbStringToArray ($string, $startPos) { //преобразуем строку в массив символов

	$strlen = mb_strlen($string); 
	while ($strlen) { 
		$array[] = mb_substr($string,$startPos,1,"UTF-8"); 
		$string = mb_substr($string,1,$strlen,"UTF-8"); 
		$strlen = mb_strlen($string); 
	}
	return $array; 
} 


function unicode_str_word_count($string) {//функция подсчета слов в строке в кодировке Unicode, правильно считает только если нет лишних пробелов
	
	$spacePos = 1;
	$wordCount = 0;
	$i = 0;
	
	while ($i == 0) {
		$spacePos = mb_strpos($string, " ", ($spacePos + 1));//ищем позицию пробела, потом ищем пробел с (найденной позиции +1)
		if ($spacePos === false) $i = 1;//если до конца строки пробела нет, то mb_strpos дает false, выходим из цикла
		
		$wordCount++;//счетчик слов в строке
		
	}
	return $wordCount;//результат функции возвращаем как значение переменной

}

function color_text($str, $value) {
	$strLen = strlen($str);
	$valueLen = mb_strlen($value, 'utf-8');
                
                if ($strLen == $valueLen) {
                	$text = stristr($value, $str);
                }
                else {
                	$cut = $strLen - $valueLen;
                	$text = mb_substr(mb_stristr($value, $str), 0, $cut, 'utf-8');
                }
                return $text;
}


//var_dump($array[67]);
//echo htmlspecialchars($array[67]);