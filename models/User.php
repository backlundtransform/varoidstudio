<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
public function getReminderEmail()
	{
		return $this->email;
	}

public function products()
    {
		return $this->belongsToMany('Product', 'pivot', 'user_id', 'tjanst_id')
		->withPivot('id','period', 'paid_to', 'activated')
		->withTimestamps()
		->orderBy('period', 'asc');
    }

   public function serviceorder()
    {
		return $this->belongsToMany('Service', 'serviceorders', 'user_id', 'service_id')
		->withPivot('id','message', 'suggested_price')
		->withTimestamps()
		->orderBy('period', 'asc');
    }


 	public static $rules = array(
 	

        'username' => 'required|unique:users',
        'password'=>'required|confirmed',
        'password_confirmation'=>'required',
		'fornamn'=>'required',
		'efternamn'=>'required',
		'telefon'=>'required',
		'email'=>'required|email'

     );

 	public static $editrules = array(
 	

        'username' => 'required',
        'password'=>'required|confirmed',
        'password_confirmation'=>'required',
		'fornamn'=>'required',
		'efternamn'=>'required',
		'telefon'=>'required',
		'email'=>'required|email'

     );

 	public static function validate($data){
             return Validator::make($data, static::$rules);
        }

     public static function editvalidate($data){
             return Validator::make($data, static::$editrules);
        }


 public static function usercreate($items)
    {
    	 $user = new User;
            $user->username = $items['username'];
            $user->password = Hash::make($items['password']);
            $user->fornamn = $items['fornamn'];
            $user->efternamn = $items['efternamn'];
            $user->telefon = $items['telefon'];
            $user->email = $items['email'];
            $user->save();
           
         
       return $user;

    }


   

    public static function insertProductPivots($items, $id, $user)
    {
    	$products = Product::all();
    

        foreach($products as $key =>$product)
        {



        	if(isset($items[$key]) && isset($items['time'.$key]))
        	{
	            $input = $items[$key];
	            $month = $items['time'.$key];
	         if($input && $month)
	            {
	            $date = new DateTime();
				$interval = new DateInterval('P'.$month.'M');
				$date->add($interval);
				$date2 = new DateTime();
				$user->products()->attach($id, array('tjanst_id' => $input, 'period' => $date->format('Y-m-d'),
					'paid_to' => $date2->format('Y-m-d')

				 )); 
	            }
	        }
       }
    }

    public static function timecheck($times, $product)
    {
       $message=null;
		foreach ($times as $key=>$time){
       		 $datetime1 = new DateTime();
        	 $datetime2 = new DateTime($time);
       		 $interval = $datetime1->diff($datetime2);
      if($interval->format('%R%a')>=0 && $interval->format('%R%a') < +206){



        $foobar=$interval->format('Du har %a dagar kvar på '.$product[$key]);
        $message[]=$foobar;
       
		
        }
    }
    return $message;
     
   }



   public static function updateProductPivots($items,$user)
    {
    	
    

        foreach($user->products as $key =>$product)
        {



        	if(isset($items[$key]) && isset($items['time'.$key]))
        	{
	            $input = $items[$key];
	            $month = $items['time'.$key];
	         if($input && $month)
	            {
	            $date = new DateTime();
				$interval = new DateInterval('P'.$month.'M');
				$date->add($interval);
				$date2 = new DateTime();
				$pivot = Pivottable::find($input);
				$pivot->period= $date->format('Y-m-d');
				$pivot->update();	

	            }
	        }
       }
    }


 public static function sort_entries($items){

    if(isset($items['order'])){
        $order=$items['order'];

        }
        else
        {

            $order='desc';
        }

        if(isset($items['sort'])){
        $sort=$items['sort'];

        }
        else
        {

            $sort='created_at';
        }
        if(isset($items['page'])){
       
        $page=$items['page'];

        }else{

            $page=1;
        }

		return array($order, $sort, $page);
        }

     }



  