<?php

class WordController extends \BaseController {

        public function guess(){
            
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
	/**
	 * Display a listing of the resource.
	 * GET /word
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /word/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /word
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /word/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /word/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /word/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /word/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}