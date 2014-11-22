<?php

class Words extends \Eloquent {
    public static function get(){
        Session::flush();
        Session::put('word',trim(file_get_contents("http://randomword.setgetgo.com/get.php")));
//        Session::put('word', "Hope");
        $word = trim(Session::get('word'));
        for ($i=0; $i<strlen($word); $i++) {  
                Session::put("displayWord",Session::get("displayWord")."-");
        } 
        return true;
    }
    
    public static function guess($guess){
        $word = Session::get('word');
        $display = "";
        $found = false;
        for ($i=0; $i<strlen($word); $i++) {  
            if(strtolower($word[$i]) == strtolower($guess)){
                //Add correct letter to the correct array
                Session::push("correct",$guess);
                $found = true;
            }            
        } 
        
        if($found){
            //Now build the display word
            for ($i=0; $i<strlen($word); $i++) {  
                if(in_array(strtolower($word[$i]), array_map('strtolower', Session::get("correct")))){
                    //Add correct letter to the correct array
                    $display .= $word[$i];
                } else $display .= "-";
            } 
            
            //Lets see if they guessed the word
            if($display == Session::get('word')){
                Session::put('solved',TRUE);
                return true;
            }
            Session::put('displayWord',$display);
            return true;
        }
        
        //The guess is wrong Add it to missed guesses
        Session::push("wrong",$guess);
        return false;
    }
    
    public static function grab_xml_definition ()
    {	
        $uri = file_get_contents("http://www.dictionaryapi.com/api/v1/references/" . urlencode("collegiate") . "/xml/" . urlencode(Session::get('word')) . "?key=" . urlencode("f26a123b-ecaa-4cc7-9555-a5bc89c145d2"));
        
        $obj = new SimpleXMLElement($uri);
        if(is_object($obj->entry[0])) return "Definition".$obj->entry[0]->def->dt[0];
        else return "No definition found on Dictionary.com.";
    }

    
    public static function getDefinition(){
        
    }
}