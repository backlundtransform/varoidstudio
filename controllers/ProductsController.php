<?php

class ProductsController extends BaseController {

   protected $layout = 'master';


     public function __construct()
    {
        

        $this->beforeFilter('admin', array('only' =>
                            array('create', 'edit', 'update', 'store', 'destroy')));
    }

    public function index()
    {

        $products = Product::All();
        $this->layout->title = 'Molntjänster';
       
        $this->layout->content = View::make('products.index', compact('products'));
       
        
    }

    
    public function create()
    {
    
        $this->layout->title = 'Add Product';
        $this->layout->content = View::make('products.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        
    $file = Input::file('image');
    $file->move('img', $file->getClientOriginalName());
   
    $product = new Product;
    $product ->name = Input::get('name');
    $product ->description = Input::get('description');
    $product ->image = 'img/'.$file->getClientOriginalName();
    $product ->save();

        return Redirect::to('products');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        $products = Product::find($id);
        $this->layout->title = $products->name;
        $this->layout->content = View::make('products.show', compact('products'));
    }

 
    public function edit($id)
    {

        $product = Product::find($id);
        $this->layout->title = 'Edit Product';
        $this->layout->content = View::make('products.edit', compact('product'));
       
    }

    
    public function update($id)
    {
       $file = Input::file('image');
     $file->move('img', $file->getClientOriginalName());
   
        $product = Product::find($id);
        $product ->name = Input::get('name');
        $product ->price = Input::get('price');
        $product ->description = Input::get('description');
        $product ->image = 'img/'.$file->getClientOriginalName();
        $product ->update();

        return Redirect::to('products');

    }

    
    public function destroy($id)
    {
        $product = Product::find($id);



        $product->delete();

        return Redirect::to('products');
    }

}