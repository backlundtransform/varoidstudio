<?php

class PivottablesController extends BaseController {

        protected $layout = 'master';

     public function __construct()
    {

        
        $this->beforeFilter('auth', array('only' =>
                            array('pivotJSON')));
        

        $this->beforeFilter('admin', array('only' =>
                            array('index', 'notpaid', 'edit', 'update', 'destroy')));
    }
    public function index()
    {
        $list = User::sort_entries(Input::all());
        $order=$list[0];
        $sort=$list[1];
        $page=$list[2];

        
        $productorders = Pivottable::orderBy($sort, $order)->paginate(10);
        $this->layout->title = 'Productorders';
       
        $this->layout->content = View::make('pivots.index', compact( 'productorders', 'page','order','sort'));
    }

     public function notpaid()
    {
        $list = User::sort_entries(Input::all());
        $order=$list[0];
        $sort=$list[1];
        $page=$list[2];

        
        $productorders = Pivottable::whereRaw('period >= paid_to')->orderBy($sort, $order)->paginate(10);
        $this->layout->title = 'Productorders';
       
        $this->layout->content = View::make('pivots.notpaid', compact( 'productorders', 'page','order','sort'));
    }



public function pivotJSON()

    {

        return Pivottable::where('user_id', '=', Auth::user()->id)->get();
     
      

      
    
    }
    

    public function edit($id)
    {
     
      

      
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
       $productorders = Pivottable::Find($id);
       if( $productorders->activated){
          $productorders->activated = 0;  

       }

       else
       {

        $productorders->activated = 1;

       }

        $productorders->update();

           
       return Redirect::to('productorders')->with('message', 'Tjänsten Aktiverad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $productorders = Pivottable::Find($id);



        $productorders->delete();

        return Redirect::to('posts')->with('message', 'The Post was deleted successfully!');
    }

}