<?php
 
class EloquentProductRepository implements ProductRepositoryInterface {
 
  public function findById($id)
  {
    $product = Product::with(array(
        'comments' => function($q)
        {
          $q->orderBy('created_at', 'desc');
        }
      ))
      ->where('id', $id)
      ->first();
 
    if(!$product) throw new NotFoundException('Product Not Found');
    return $product;
  }
 
  public function findAll()
  {
    return Product::with(array(
        'comments' => function($q)
        {
          $q->orderBy('created_at', 'desc');
        }
      ))
      ->orderBy('created_at', 'desc')
      ->get();
  }
 
  public function paginate($limit = null)
  {
    return Product::paginate($limit);
  }
 
  public function store($data)
  {
    $this->validate($data);
    return Product::create($data);
  }
 
  public function update($id, $data)
  {
    $product = $this->findById($id);
    $product->fill($data);
    $this->validate($product->toArray());
    $product->save();
    return $product;
  }
 
  public function destroy($id)
  {
    $product = $this->findById($id);
    $product->delete();
    return true;
  }
 
  public function validate($data)
  {
    $validator = Validator::make($data, Product::$rules);
    if($validator->fails()) throw new ValidationException($validator);
    return true;
  }
 
  public function instance($data = array())
  {
    return new Product($data);
  }
 
}