<?php
namespace V1;
 
use BaseController;
use ProductRepositoryInterface;
use Input;
use View;
 
class ProductsController extends BaseController {
 
  /**
   * We will use Laravel's dependency injection to auto-magically
   * "inject" our repository instance into our controller
   */
  public function __construct(ProductRepositoryInterface $products)
  {
    $this->products = $products;
  }
 
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return $this->products->findAll();
  }
 
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $product = $this->products->instance();
    return View::make('products._form', compact('product'));
  }
 
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    return $this->products->store( Input::all() );
  }
 
  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function show($id)
  {
    return $this->products->findById($id);
  }
 
  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {
    $product = $this->products->findById($id);
    return View::make('products._form', compact('product'));
  }
 
  /**
   * Update the specified resource in storage.
   *
   * @param int $id
   * @return Response
   */
  public function update($id)
  {
    return $this->products->update($id, Input::all());
  }
 
  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    $this->products->destroy($id);
    return '';
  }
 
}