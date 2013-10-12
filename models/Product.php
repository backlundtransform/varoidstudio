<?php

class Product extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    public function user()
    {
      return $this->belongsToMany('User', 'pivot', 'tjanst_id', 'user_id');
    }


    public function insertProductPivots()
    {
    	$products = Product::all();
    
        foreach($products as $key =>$product)
        {
            $input = Input::get($key);
            if($input)
            {
                $user->products()->attach($id, array('tjanst_id' => $input)); 
            }
       }
    }

    
}