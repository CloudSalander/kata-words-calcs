<?php
	function hasDot($text) {
		$has_dot = str_contains($text, '.')? true : false;
		return $has_dot;
	}

	function analyzeText($text) {
    	$splitted_text = explode(" ",$text);
    	$phrase_counter = 0;
    	$letter_counter = 0;
    	$longest_word = "";
    	$max_word_length = 0;
    	foreach($splitted_text as $word) {
    		if(hasDot($word)) ++$phrase_counter;
    		$word = str_replace(".", "",$word);
    		$word_length = strlen($word);
    		$letter_counter += $word_length;
    		if($word_length > $max_word_length) {
    			$max_word_length = $word_length;
    			$longest_word = $word;
    		}

    	}
    	echo "Number of words on this text is:".count($splitted_text).PHP_EOL;
    	echo "Number of phrase on this text is:".$phrase_counter.PHP_EOL;
    	echo "Average length of the words of this text:".$letter_counter/count($splitted_text).PHP_EOL;
    	echo "Longest word is ".$longest_word;
    }


	$texto1 = "Esto es un texto de prueba. Tendrá solo 3 oraciones. A ver si funciona.";
	$esto_es_un_monologazo="";
    analyzeText($texto1);

?>