<?php
$text = file_get_contents('text_windows1251.txt');//Считываем полный текст файла в переменную $text
$textConverted = mb_convert_encoding($text, 'utf-8', 'Windows-1251');//сконвертировали в Unicode
$array = explode("\r\n", $textConverted);//разбивка на абзацы
foreach ($array as &$paragraph) {
	$symbolCount = mb_strstr($paragraph, 'utf-8');//количество символов в каждом абзаце
	$wordCount = unicode_str_word_count($paragraph);//количество слов в каждом абзаце
	$paragraphTemp = explode('. ', $paragraph);//разбиваем каждый абзац на предложения по признаку точка-пробел
	$sentenceCount = count($paragraphTemp);//количество предложений в каждом абзаце
	$paragraph = substr_replace($paragraph, '<p>', 0, 0);//добавление тега в начало строки каждого абзаца
	$paragraph = substr_replace($paragraph, '</p>', strlen($paragraph), 4);//добавление тега в конец строки каждого абзаца
	//foreach ($paragraph as &$word) {//разбивка предложений на слова по пробелу между ними
        $word = explode(" ", $paragraph);//массив слов в каждом абзаце
        //$wordLength = count($word);
        //for ($i = 0; $i <= $wordLength; $i++) {
        foreach ($word as &$value) {
        	$value = str_ireplace(["HTML", "PHP", "ASP", "ASP\.NET", "Java"], ['<span style="color: blue">'.color_text("html", $value).'</span>', '<span style="color: blue">'.color_text("php", $value).'</span>', '<span style="color: blue">'.color_text("asp", $value).'</span>', '<span style="color: blue">'.color_text("asp\.net", $value).'</span>', '<span style="color: blue">'.color_text("java", $value).'</span>'], $value);
    	}
        $paragraph = implode(' ', $word);
    //}


}
$alphabet = 'A`B`C`D`E`F`G`H`I`J`K`L`M`N`O`P`Q`R`S`T`U`V`W`X`Y`Z`a`b`c`d`e`f`g`h`i`j`k`l`m`n`o`p`q`r`s`t`u`v`w`x`y`z`А`Б`В`Г`Д`Е`Ё`Ж`З`И`Й`К`Л`М`Н`О`П`Р`С`Т`У`Ф`Х`Ц`Ч`Ш`Щ`Ъ`Ы`Ь`Э`Ю`Я`а`б`в`г`д`е`ё`ж`з`и`й`к`л`м`н`о`п`р`с`т`у`ф`х`ц`ч`ш`щ`ъ`ы`ь`э`ю`я';
$alphabetArray = explode('`', $alphabet);
$alphabetArrayLength = count($alphabetArray);


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
