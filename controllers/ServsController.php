<?php

class ServsController extends BaseController {

   protected $layout = 'master';


     public function __construct()
    {
        

        $this->beforeFilter('admin', array('only' =>
                            array('create', 'edit', 'store', 'update', 'destroy')));

    }

    public function index()
    {

        $services = Serv::All();
      $this->layout->title ='Services';
      $this->layout->content = View::make('services.index', compact('services'));
       
        
    }

    
   
    public function create()
    {


        $this->layout->title = 'Add Service';
        $this->layout->content = View::make('services.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
      

    $file = Input::file('image');
    $file->move('img',$file->getClientOriginalName());
   
    $service = new Serv;
    $service ->name = Input::get('name');
    $service ->description = Input::get('description');
    $service ->image = 'img/'.$file->getClientOriginalName();
    $service ->save();

        return Redirect::to('services');
       
       
    }

public function savepivot($id) {


  if (Auth::guest()){


            $validation = User::validate(Input::all());
        if($validation->fails()){

       
       
            return Redirect::to('services/'.$id)->withErrors($validation);
        }

        else{
           
           $user = User::usercreate(Input::all());
           $userid= User::where('username', '=', Input::get('username'))->first()->id;
             }  
    }
    else
        {
            $user = Auth::user();
            $userid =  Auth::user()->id;

    }
        
         $serviceorder = new Serviceorder;
     
        $serviceorder->user_id= $userid;
        $serviceorder->service_id= $id;
        $serviceorder->suggested_price= Input::get('suggested_price');
        $serviceorder->message= Input::get('message');
         $serviceorder->save();


 return Redirect::to('login');
    
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        $services = Serv::find($id);
        $this->layout->title = $services->name;
        $this->layout->content = View::make('services.show', compact('services'));
    }

   


    public function edit($id)
    {

        $service = Serv::find($id);
        $this->layout->title = 'Edit Service';
        $this->layout->content = View::make('services.edit', compact('service'));
       
    }

    
    public function update($id)
    {
       $file = Input::file('image');
     $file->move('img', $file->getClientOriginalName());
   
        $service = Serv::find($id);
        $service ->name = Input::get('name');
        $service ->price = Input::get('price');
        $service ->description = Input::get('description');
        $service ->image = 'img/'.$file->getClientOriginalName();
        $service ->update();

        return Redirect::to('services');

    }

    public function destroy($id)
    {
        $service = Service::find($id);



        $service->delete();

        return Redirect::to('services');
    }
    
}