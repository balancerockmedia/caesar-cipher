class Caesar
    
    def initialize
        @char_set = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_- '
    end

    def encode (orig_string, shift)
        new_string = ''
        orig_string = orig_string.split(//)
    
        orig_string.each do |item|
            index = @char_set.index(item)
        
            if (index + shift) >= @char_set.length()
                index = (index + shift) - @char_set.length()
            else
                index += shift
            end
        
            new_string += @char_set[index, 1]
        end
    
        return new_string
    end
    
    def decode (orig_string, shift)
        new_string = ''
        orig_string = orig_string.split(//)
    
        orig_string.each do |item|
            index = @char_set.index(item)
        
            if (index - shift) < 0
                index = (index - shift) + @char_set.length()
            elsif (index - shift) == 0    
                index = 0
            else
                index -= shift
            end
        
            new_string += @char_set[index, 1]
        end
    
        return new_string
    end
    
end

c = Caesar.new
puts c.encode('this is fun', 3)
puts c.decode('wklvclvcixq', 3)