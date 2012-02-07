<?php

class Caesar {
    
    private $char_set = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o',
'p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K',
'L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7',
'8','9','_','-',' ');
    
    public function encode($orig_string, $shift) {
        $new_string = '';
    	$orig_string = str_split($orig_string, 1);
    	foreach($orig_string as $item) {
    		$index = array_search($item, $this->char_set);

    		if (($index + $shift) >= count($this->char_set)) {
    			$index = ($index + $shift) - count($this->char_set);
    		} else {
    			$index += $shift;
    		}

    		$new_string .= $this->char_set[$index];
    	}
    	return $new_string;
    }
    
    public function decode($orig_string, $shift) {
        $new_string = '';
        $orig_string = str_split($orig_string, 1);
        foreach($orig_string as $item) {
    		$index = array_search($item, $this->char_set);

    		if (($index - $shift) < 0) {
    			$index = ($index - $shift) + count($this->char_set);
    		} else if (($index - $shift) == 0) { 
    		    $index = 0;
    		} else {
    			$index -= $shift;
    		}

    		$new_string .= $this->char_set{$index};
    	}
    	
    	return $new_string;
    }
}

$c = new Caesar();
echo $c->encode('this is fun', 3);
echo $c->decode('wklvclvcixq', 3);

?>