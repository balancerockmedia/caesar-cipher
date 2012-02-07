class Caesar:
    
    def __init__(self):
        self.char_set = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_- '
        
    def encode(self, orig_string, shift):
        new_string = ''
        orig_string = list(orig_string)
        for item in orig_string:
            index = self.char_set.find(item)
            
            if (index + shift) >= len(self.char_set):
                index = (index + shift) - len(self.char_set)
            else:
                index += shift
                
            new_string += self.char_set[index]
        
        return new_string

    def decode(self, orig_string, shift):
        new_string = ''
        orig_string = list(orig_string)
        for item in orig_string:
            index = self.char_set.find(item)

            if (index + shift) < 0:
                index = (index - shift) + len(self.char_set)
            elif (index - shift) == 0:
                index = 0
            else:
                index -= shift

            new_string += self.char_set[index]

        return new_string
           
c = Caesar()
print c.encode('this is fun', 3)
print c.decode('wklvclvcixq', 3)