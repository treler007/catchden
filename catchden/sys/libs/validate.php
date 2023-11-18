<?     
 function clearValue($value){
            $value = trim($value);
            $value = htmlspecialchars($value);
            return $value;
 }