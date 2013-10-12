<?php

class ServiceordersController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
        protected $layout = 'master';

    public function __construct()
    {
        

        $this->beforeFilter('admin', array('only' =>
                            array('index', 'edit', 'update', 'destroy', 'show','deadline')));
    }
    public function index()
    {
        $list = User::sort_entries(Input::all());
        $order=$list[0];
        $sort=$list[1];
        $page=$list[2];

        
        $serviceorders = Serviceorder::where('date_started','=','0000-00-00')->orderBy($sort, $order)->paginate(10);
        $this->layout->title = 'Serviceorders';
       
        $this->layout->content = View::make('serviceorders.index', compact( 'serviceorders', 'page','order','sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function deadline()
    {
        $list = User::sort_entries(Input::all());
        $order=$list[0];
        $sort=$list[1];
        $page=$list[2];

        
        $serviceorders = Serviceorder::where('date_started','!=','0000-00-00')->orderBy($sort, $order)->paginate(10);
        $this->layout->title = 'Serviceorders';
       
        $this->layout->content = View::make('serviceorders.deadline', compact( 'serviceorders', 'page','order','sort'));
    }

    
   
    public function show($id)
    {
      $serviceorder = Serviceorder::find($id); 
      $user = User::find($serviceorder->user_id); 
      $this->layout->title = 'Serviceorders';
       
        $this->layout->content = View::make('serviceorders.show', compact( 'serviceorder', 'user'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $serviceorder = Serviceorder::Find($id);
        $this->layout->title = 'Edit Service';
        $this->layout->content = View::make('serviceorders.edit', compact('serviceorder'));
    }


    public function update($id)
    {
        $serviceorder = Serviceorder::Find($id);

        $serviceorder->suggested_price = Input::get('suggested_price');
        $serviceorder->our_modificated_price = Input::get('our_modificated_price');
        $serviceorder->deadline = Input::get('deadline');
        $serviceorder->date_started = Input::get('date_started');
        $serviceorder->date_paid = Input::get('date_paid');
        $serviceorder->paid_deadline = Input::get('paid_deadline');
        $serviceorder->update();



        return Redirect::to('deadline');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}