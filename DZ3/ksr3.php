<?php
//$text = file_get_contents('text_windows1251.txt');//Считываем полный текст файла в переменную $text
//$textConverted = mb_convert_encoding($text, 'utf-8', 'Windows-1251');//сконвертировали в Unicode
//$array = explode("\r\n", $textConverted);//разбивка на абзацы
//foreach ($array as &$paragraph) {
//	$symbolCount = mb_strstr($paragraph, 'utf-8');//количество символов в каждом абзаце
//	$wordCount = str_word_count($paragraph, 0, '0123456789');//количество слов в каждом абзаце
//	$paragraphTemp = explode('. ', $paragraph);//разбиваем каждый абзац на предложения по признаку точка-пробел
//	$sentenceCount = count($paragraphTemp);//количество предложений в каждом абзаце
//	//$paragraph = substr_replace($paragraph, '<p>', 0, 0);//добавление тега в начало строки каждого абзаца
//	//$paragraph = substr_replace($paragraph, '</p>', strlen($paragraph), 4);//добавление тега в конец строки каждого абзаца
//	foreach ($paragraphTemp as &$sentence) {//разбивка предложений на слова, в слова включают в себя цифры и %
//        $sentence = str_word_count($sentence, 1, '0123456789%');
//    }


//}
//$alphabet = 'A`B`C`D`E`F`G`H`I`J`K`L`M`N`O`P`Q`R`S`T`U`V`W`X`Y`Z`a`b`c`d`e`f`g`h`i`j`k`l`m`n`o`p`q`r`s`t`u`v`w`x`y`z`А`Б`В`Г`Д`Е`Ё`Ж`З`И`Й`К`Л`М`Н`О`П`Р`С`Т`У`Ф`Х`Ц`Ч`Ш`Щ`Ъ`Ы`Ь`Э`Ю`Я`а`б`в`г`д`е`ё`ж`з`и`й`к`л`м`н`о`п`р`с`т`у`ф`х`ц`ч`ш`щ`ъ`ы`ь`э`ю`я';
//$alphabetArray = explode('`', $alphabet);
//$alphabetArrayLength = count($alphabetArray);
//foreach ($variable as $key => $value) {
	# code...
//}

$string = "sdfs hhhh hhhh hhhh";
function unicode_str_word_count($string) {
	$stringLength = mb_strlen($string);
	$spacePos = 1;
	$wordCount = 0;
	$i = 0;
	$j = 0;
	//for($i = 0; $i < $stringLength; $i++) {
	while ($i == 0) {
		$spacePos = mb_strpos($string, " ", $spacePos);
		if (mb_strpos($string, " ", $spacePos) === false) $i = 1;
		//$j = $spacePos;
		$wordCount++;
		
	}
	echo "Количество слов $wordCount";
}
unicode_str_word_count($string);

	//}
	
//}
//for ($i = 0; $i <= $alphabetArrayLength; $i++)
//var_dump($array);
//var_dump($alphabetArray);
////$textNew = implode($array);
////echo $textNew;
////Выполняем задание (при разбивке по абзацам учтите, что в Windows1251 абзацы разделяются через "\r\n")
