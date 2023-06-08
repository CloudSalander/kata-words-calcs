<?php
	function hasDot($text) {
		$has_dot = str_contains($text, '.')? true : false;
		return $has_dot;
	}

	function removePunctuationMarks($word) {
		$punctuation_marks = ['.',';',',',':','!','¡','?','¿','"','\''];
		return str_replace($punctuation_marks,"",$word);
	}

	function analyzeText($text) {
    	$splitted_text = explode(" ",$text);
    	$phrase_counter = 0;
    	$letter_counter = 0;
    	$longest_word = "";
    	$max_word_length = 0;
    	foreach($splitted_text as $word) {
    		if(hasDot($word)) ++$phrase_counter;
    		$word = removePunctuationMarks($word);
    		var_dump($word);
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


	$texto1 = "Esto es un texto, de: prueba. Tendrá solo 3 oraciones. A ver si funciona.";
	$esto_es_un_monologazo="Love is awful. It’s awful. It’s painful. It’s frightening. 
It makes you doubt yourself, judge yourself, distance yourself from the other people in your life. I
t makes you selfish. It makes you creepy, makes you obsessed with your hair, makes you cruel, makes you say and do things you never thought you would do. 
It’s all any of us want, and it’s hell when we get there. 
So no wonder it’s something we don’t want to do on our own. 
I was taught if we’re born with love then life is about choosing the right place to put it. 
People talk about that a lot, feeling right, when it feels right it’s easy. But I’m not sure that’s true. 
It takes strength to know what’s right. And love isn’t something that weak people do. Being a romantic takes a hell of a lot of hope. 
I think what they mean is, when you find somebody that you love, it feels like hope.";

    analyzeText($texto1);
    analyzeText($esto_es_un_monologazo);

?>