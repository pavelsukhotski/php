<?php
$text = file_get_contents('text_windows1251.txt');//Считываем полный текст файла в переменную $text
$textConverted = mb_convert_encoding($text, 'utf-8', 'Windows-1251');//сконвертировали в Unicode
$array = explode("\r\n", $textConverted);//разбивка на абзацы
foreach ($array as &$paragraph) {
	$symbolCount = mb_strstr($paragraph, 'utf-8');//количество символов в каждом абзаце
	$wordCount = unicode_str_word_count($paragraph);//количество слов в каждом абзаце
	$sentence = explode('. ', $paragraph);//разбиваем каждый абзац на предложения по признаку точка-пробел
	$sentenceCount = count($sentence);//количество предложений в каждом абзаце
	//$paragraph = substr_replace($paragraph, '<p>', 0, 0);//добавление тега в начало строки каждого абзаца
	//$paragraph = substr_replace($paragraph, '</p>', strlen($paragraph), 4);//добавление тега в конец строки каждого абзаца
	//foreach ($paragraph as &$word) {//разбивка предложений на слова по пробелу между ними
        $word = explode(" ", $paragraph);//массив слов в каждом абзаце
        //$wordLength = count($word);
        //for ($i = 0; $i <= $wordLength; $i++) {
        foreach ($word as &$value) {
        	$value = str_ireplace(["HTML", "PHP", "ASP", "ASP\.NET", "Java"], ['<span style="color: blue">'.color_text("html", $value).'</span>', '<span style="color: blue">'.color_text("php", $value).'</span>', '<span style="color: blue">'.color_text("asp", $value).'</span>', '<span style="color: blue">'.color_text("asp\.net", $value).'</span>', '<span style="color: blue">'.color_text("java", $value).'</span>'], $value);
    	}
        $paragraph = implode(' ', $word);//собираем из массива слов абзац
        $sentence = explode('. ', $paragraph);//разбиваем каждый абзац на предложения по признаку точка-пробел
foreach ($sentence as &$charArray) {
//$firstLetter = mb_strpos($sentence, '>') + 1;
	$charArray = mbStringToArray($sentence, 0);//преобразуем каждое предложение в массив символов
	if (in_array($charArray[0], $alphabetArray)) {
    	$charArray[0] = "<b>$charArray[0]</b>";//если первый символ буква, то заменяем ее на жирную эту же букву
    }
elseif ($charArray[0] != '<') {//если первый символ не буква и не начало тэга, то ищем первую букву
    				$charCounter = 0;
    				for ($charK = 1; $charK < count($charArray) && $charCounter == 0; $charK++)
    				if (in_array($charArray[$charK], $alphabetArray)) {
    					$char[$charK] = "<b>$char[$charK]</b>";
    					$charCounter++;
   				}
    			}

    else {//если первый символ начало тэга, то ищем закрытие тэга и первую букву за ним
    	$charCounter = 0;
    	for ($char = 1; ($char < count($charArray)) && ($charCounter == 0); $char++) {
    		if ($charArray[$char] == '>') {
    			for ($charK = ($char + 1); ($charK < count($charArray)) && ($charCounter == 0); $charK++) {
    				if (in_array($charArray[$charK], $alphabetArray)) {
    					$charArray[$charK] = "<b>$charArray[$charK]</b>";
    					$charCounter++;
    				}
    			}
    		}
    	}
    }
}
$sentence = implode($charArray);
$paragraph = implode('. ', $sentence);

 //   foreach ($sentence as &$wordSent) {
 //   	$wordSent = explode(' ', $sentence);//массив слов в каждом предложении абзаца
 //   	foreach ($wordSent as &$char) {
 //   		$char = mbStringToArray($wordSent[0]);//массив символов первого слова каждого предложения
 //   		//for ($k = 0; $k < mb_strlen($wordSent[0]); $k++) {
 //   			if (in_array($char[0], $alphabetArray) {
 //   				$char[0] = "<b>$char[0]</b>";
 //   			}
 //   			elseif ($char[0] != '<') {
 //   				$charCounter = 0;
 //   				for ($charK = 1; $charK < count($char) && $charCounter == 0; $charK++)
 //   				if (in_array($char[$charK], $alphabetArray)) {
 //   					$char[$charK] = "<b>$char[$charK]</b>";
//    					$charCounter++;
 //   				}
 //   			}
 //   			else {
//
 //   			}
    		//}
    	//}
    //}
    //}


}
$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя';
//$alphabetArray = explode('`', $alphabet);
//$alphabetArray = mb_split('`', $alphabet);
$alphabetArray = mbStringToArray($alphabet, 0);
$alphabetArrayLength = count($alphabetArray);

function mbStringToArray ($string, $startPos) { //преобразуем строку в массив символов
    $strlen = mb_strlen($string); 
    while ($strlen) { 
        $array[] = mb_substr($string,$startPos,1,"UTF-8"); 
        $string = mb_substr($string,1,$strlen,"UTF-8"); 
        $strlen = mb_strlen($string); 
    } 
    return $array; 
} 

//$string = "БББ РРР фывф";
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
        	if ($strLen = $valueLen) {
        		$text = stristr($value, $str);
        	}
        	else {
        		$cut = $strLen - $valueLen;
        		$text = mb_substr(mb_stristr($value, $str), 0, $cut, 'utf-8');
        	}
        	return $text;
        }
//unicode_str_word_count($string);

	//}
	
//}
//for ($i = 0; $i <= $alphabetArrayLength; $i++) 
//var_dump($array);
//var_dump($alphabetArray);
//var_dump($wordCount);
//var_dump($sentenceCount);
//var_dump($word);
$textNew = implode("\r\n", $array);
echo $textNew;
//echo $array;
//Выполняем задание (при разбивке по абзацам учтите, что в Windows1251 абзацы разделяются через "\r\n")
