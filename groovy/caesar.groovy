class Caesar {
    
    private String char_set = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_- "
    
    String encode(String orig_string, Integer shift) {
        def new_string = ""
		
		orig_string.each { el ->
			int index = char_set.indexOf(el)
			
    		if ((index + shift) >= char_set.size()) {
    			index = (index + shift) - char_set.size()
    		} else {
    			index += shift
    		}

    		new_string <<= char_set.getAt(index)
		}
		
    	return new_string;
    }
    
    String decode(String orig_string, Integer shift) {
        def new_string = ""
		
        orig_string.each { el ->
    		int index = char_set.indexOf(el)

    		if ((index - shift) < 0) {
    			index = (index - shift) + char_set.size();
    		} else if ((index - shift) == 0) { 
    		    index = 0
    		} else {
    			index -= shift
    		}

    		new_string <<= char_set.charAt(index)
    	}
    	
    	return new_string
    }
}

c = new Caesar()

assert c.encode('this is fun', 3).toString() == "wklvclvcixq"
assert c.decode('wklvclvcixq', 3).toString() == "this is fun"

println c.encode('this is fun', 3)
println c.decode('wklvclvcixq', 3)