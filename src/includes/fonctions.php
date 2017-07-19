<?php
	function debug($array){
		echo("<div class='well'><pre>".var_dump($array)."</pre></div>");
	}
	function diebug($array){
		echo("<div class='well'><pre>".var_dump($array)."</pre></div>");
		die();
	}