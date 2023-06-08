<?php
	function hasDot($text) {
		$has_dot = str_contains($text, '.')? true : false;
		return $has_dot;
	}

	function removePunctuationMarks($word) {
		$punctuation_marks = ['.',';',',',':','!','¡','?','¿','"','\''];
		return str_replace($punctuation_marks,"",$word);
	}

	function printAnalyzedTextResult($splitted_text_size, $phrase_counter, $letter_counter, $longest_word) {
		echo "Number of words on this text is:".$splitted_text_size.PHP_EOL;
    	echo "Number of phrase on this text is:".$phrase_counter.PHP_EOL;
    	echo "Average length of the words of this text:".$letter_counter/$splitted_text_size.PHP_EOL;
    	echo "Longest word is ".$longest_word.PHP_EOL;

	}

	function analyzeText($text) {
    	$splitted_text = explode(" ",$text);
    	$phrase_counter = 0;
    	$letter_counter = 0;
    	$longest_word = "";
    	foreach($splitted_text as $word) {
    		if(hasDot($word)) ++$phrase_counter;
    		$word = removePunctuationMarks($word);
    		$word_length = strlen($word);
    		$letter_counter += $word_length;
    		if($word_length > strlen($longest_word)) $longest_word = $word;
    	}
    	printAnalyzedTextResult(count($splitted_text),$phrase_counter,$letter_counter,$longest_word);
    }


    $file1 = fopen("texto1.txt", "r") or die("Unable to open file.");
    $file2 = fopen("texto2.txt", "r") or die("Unable to open file.");
    $files = ["texto1.txt" => $file1, "texto2.txt" => $file2];

    foreach($files as $key => $file) {
    	$text =  fread($file,filesize($key));
    	analyzeText($text);
    }

?>