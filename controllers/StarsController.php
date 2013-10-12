<?php

class StarsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
     return View::make('stars.index');
    }
  public function all()
    {
     return Star::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
      public function search()
    {
        	
	$queries =Star::getqueries(Input::except('fields','start','limit','sort'));
	
		$Field = Input::get('fields');
		$start =  Input::get('start');
		$limit =  Input::get('limit');
		$sort = Input::get('sort');
		if($Field != null){
		$Field =trim($Field,"[]");
			$Field = explode(",", $Field);
		}
		
		
		if($sort!= null){
		$sort =trim($sort,"[]");
			$sort = explode(":", $sort);
		
		}else{
		
		$sort = explode(":", "name:asc");
	}
		
		
		return Star::fields($queries,$Field,$start,$limit,$sort);
			
     
    }
	
      
        
  
}