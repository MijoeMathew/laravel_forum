<?php
 
class EloquentCategoryRepository implements CategoryRepositoryInterface {
 
  public function findById($id)
  {
    $category = Category::with(array(
        'comments' => function($q)
        {
          $q->orderBy('created_at', 'desc');
        }
      ))
      ->where('id', $id)
      ->first();
 
    if(!$category) throw new NotFoundException('Category Not Found');
    return $category;
  }
 
  public function findAll()
  {
    return Category::all()
		->orderBy('created_at', 'desc')
      ->get();
  }
 
  public function paginate($limit = null)
  {
    return Category::paginate($limit);
  }
 
  public function store($data)
  {
    $this->validate($data);
    return Category::create($data);
  }
 
  public function update($id, $data)
  {
    $category = $this->findById($id);
    $category->fill($data);
    $this->validate($category->toArray());
    $category->save();
    return $category;
  }
 
  public function destroy($id)
  {
    $category = $this->findById($id);
    $category->delete();
    return true;
  }
 
  public function validate($data)
  {
    $validator = Validator::make($data, Category::$rules);
    if($validator->fails()) throw new ValidationException($validator);
    return true;
  }
 
  public function instance($data = array())
  {
    return new Category($data);
  }
 
}