<?php

class Star extends Eloquent {
  protected $table = 'stars';
  
  	public static function fields($queries, $Field=null, $start=null, $limit=null, $sort=null)
	{
		
		
	if($limit!=null || $start!=null){
		if($Field == null)
		{
			
			return Star::whereraw($queries)->take($limit)->skip($start)->select("*")->orderBy($sort[0], $sort[1])->get();
		}
		else
		{
			return Star::whereraw($queries)->take($limit)->skip($start)->select($Field)->orderBy($sort[0], $sort[1])->get();
		}
	}
	else
	{
		
		
		if($Field == null)
		{
			return Star::whereraw($queries)->select("*")->orderBy($sort[0], $sort[1])->get();
		}
		else
		{
			return Star::whereraw($queries)->select($Field)->orderBy($sort[0], $sort[1])->get();
		}
			
	}
	}
  
   public static function getqueries($inputs)
    {
        $values = array_keys($inputs);
    	$queries  = "";
	   
	 
	   if(empty($values)){
	   	
			
		$queries = 1;
			
		}else
		
		{
		   		
      		foreach ($values as $key=>$value) {
       
        	if($key!=count($values)-1)
       		 {
       		 	
				
				if(strpos($values[$key],':') !== false) {
						$value_explode = explode(":", $values[$key]);
					
					
   				$queries = $queries."`".$value_explode[0]. "`". Star::getarray($value_explode[1])."" .$inputs[$values[$key]]." AND  ";	
				 }
				else
					{
						
				$queries = $queries."`".$values[$key]. "` = '" .$inputs[$values[$key]]."' AND  ";			
					}
						
				
					
       		 }
        		else
        		{
        			
					
				if(strpos($values[$key],':') !== false) {
						$value_explode = explode(":", $values[$key]);
						
					
					$queries = $queries."`".$value_explode[0]. "`". Star::getarray($value_explode[1])."" .$inputs[$values[$key]]."";	
				
			
				 }
				else
					{
						
					$queries = $queries."`".$values[$key]. "` = '" .$inputs[$values[$key]]."'";	}
						
					
					
					}			
					
        	
             
			
        
    }
  } 
       return $queries;
}


	public static function getarray($value)
    	{
				
					
		$array = array(
    		"gte" => ">=",
   	 		"gt" => ">",
   			"lt"  => "<",
    		"lte"  => "<=",
		);
	
		return $array[$value];
		
	}

	
}

 