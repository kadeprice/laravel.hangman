<?php

class WordController extends \BaseController {

        public function guess(){
            if(trim(Input::get('guess')) == "") return Redirect::back()->withNotification("Please Enter a Letter.");
            if (Words::guess(Input::get('guess'))) {
                return Redirect::to("/")->withNotification("Good Guess!");       
            }
            //The guess was wrong. Lets see how many times they have been wrong
            if(count(Session::get('wrong')) > 5){
                Session::put('died', TRUE);
                return Redirect::to("/");
            }
            return Redirect::to("/")->withNotification("Sorry but that isn't right!");       
            
            //It wasn't found so check to see how many misses.
            
        }

}