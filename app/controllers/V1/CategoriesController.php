<?php
namespace V1;
 
use BaseController;
use CategoryRepositoryInterface;
use Input;
use View;
 
class CategoriesController extends BaseController {
 
  /**
   * We will use Laravel's dependency injection to auto-magically
   * "inject" our repository instance into our controller
   */
  public function __construct(CategoryRepositoryInterface $categories)
  {
    $this->categories = $categories;
  }
 
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return $this->categories->findAll();
  }
 
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $product = $this->categories->instance();
    return View::make('categories._form', compact('product'));
  }
 
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    return $this->categories->store( Input::all() );
  }
 
  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function show($id)
  {
    return $this->categories->findById($id);
  }
 
  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {
    $product = $this->categories->findById($id);
    return View::make('categories._form', compact('product'));
  }
 
  /**
   * Update the specified resource in storage.
   *
   * @param int $id
   * @return Response
   */
  public function update($id)
  {
    return $this->categories->update($id, Input::all());
  }
 
  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    $this->categories->destroy($id);
    return '';
  }
 
}