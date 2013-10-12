<?php

class UsersController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


     protected $layout = 'master';
   
   public function __construct()
    {
        

    $this->beforeFilter('user', array('only' =>
                            array('show', 'edit', 'update', 'editpivot', 'updatepivot')));
   

     $this->beforeFilter('admin', array('only' =>
                            array('index','destroy')));

    }
    public function index()


    {

        $list = User::sort_entries(Input::all());
        $order=$list[0];
        $sort=$list[1];
        $page=$list[2];


        $users = User::orderBy($sort, $order)->paginate(10);
        $this->layout->title = 'Users';
       
        $this->layout->content = View::make('users.index', compact('users', 'page','order','sort'));
       

    }
  
  
    
    public function store()
    {

    if (Auth::guest()){


            $validation = User::validate(Input::all());
        if($validation->fails()){

       
       
            return Redirect::to('products')->withErrors($validation);
        }

        else{
           
           $user = User::usercreate(Input::all());
           $id = User::where('username', '=', Input::get('username'))->first()->id;
             }  
    }
    else
        {
            $user = Auth::user();
            $id =  Auth::user()->id;

    }
        User::insertProductPivots(Input::all(), $id, $user);
     
        return Redirect::to('login');

    }

    /**
     */
    public function show($id)
    {

     
      
        $user = User::find($id);


         $list = User::sort_entries(Input::all());
        $order=$list[0];
        $sort=$list[1];
        $page=$list[2];

        
      
       $pivots=  Pivottable::where('user_id', '=' , $id)->orderBy($sort, $order)->paginate(1000);


      foreach ($user->products as $products)
        {
         $foobar1 = Product::find($products->pivot->tjanst_id)->name;
         $product[] = $foobar1;
         $foobar2 = $products->pivot->paid_to;
         $paid[] = $foobar2;

         }
       


    
    if(isset($paid)){
        $message = User::timecheck($paid, $product);
        }

 $serviceorders = Serviceorder::where('user_id', '=' , $id)->orderBy($sort, $order)->paginate(1000);

        $this->layout->title = $user->username;
        $this->layout->content = View::make('users.show', compact('user', 'product', 'pivots', 'message', 'sort', 'order', 'page', 'serviceorders'));
    
   
        
    }

        
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $users = User::Find($id);
        $this->layout->title = 'Edit Profile';
        $this->layout->content = View::make('users.edit', compact('users'));
    }

    public function editpivot($id)
    {
        $users = User::Find($id);
        $this->layout->title = 'Edit Product';

      $products = $users->products;
     
        
       
        
        $this->layout->content = View::make('users.editpivot', compact('users', 'products'));
    }



     public function updatepivot($id)
    {
               $user = User::Find($id);
                $items=  Input::all();
      
        
            User::updateProductPivots($items, $user);
       
        
             return Redirect::to('users/'.$id);
         

   
        
    }



    public function update($id)
    {

        

     $validation = User::editvalidate(Input::all());
        if($validation->fails()){

       
       
            return Redirect::to('users/'.$id)->withErrors($validation);
        }

        else{
           
         
            $users->username = Input::get('username');
            $users->password = Hash::make(Input::get('password'));
            $users->fornamn = Input::get('fornamn');
            $users->efternamn = Input::get('efternamn');
            $users->telefon = Input::get('telefon');
            $users->email = Input::get('email');
            $users->update();
           
             } 
       
      return Redirect::to('users/'.$id);
        
    }
     
    public function destroy($id)
    {
        //
    }

}