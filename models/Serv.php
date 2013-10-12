<?php

class Serv extends Eloquent {

	protected $table = 'service';

	public function user()
    {
      return $this->belongsToMany('User', 'serviceorders', 'service_id', 'user_id');
    }
   
}