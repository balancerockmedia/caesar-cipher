<?php

class Caesar {
    
    private $char_set = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_- ';
    
    public function encode($orig_string, $shift) {
        $new_string = '';
    	$string = str_split($orig_string, 1);
    	foreach($string as $item) {
    		$index = strpos($this->char_set, $item);

    		if (($index + $shift) >= strlen($this->char_set)) {
    			$index = ($index + $shift) - strlen($this->char_set);
    		} else {
    			$index += $shift;
    		}

    		$new_string .= $this->char_set{$index};
    	}
    	return $new_string;
    }
    
    public function decode($orig_string, $shift) {
        $new_string = '';
        $string = str_split($orig_string, 1);
        foreach($string as $item) {
    		$index = strpos($this->char_set, $item);

    		if (($index - $shift) < 0) {
    			$index = ($index - $shift) + strlen($this->char_set);
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