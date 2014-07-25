<?php
 
class EloquentProductRepositoryTest extends TestCase {
 
  public function setUp()
  {
    parent::setUp();
    $this->repo = App::make('EloquentProductRepository');
  }
 
  public function testFindByIdReturnsModel()
  {
    $product = $this->repo->findById(1);
    $this->assertTrue($product instanceof Illuminate\Database\Eloquent\Model);
  }
 
  public function testFindAllReturnsCollection()
  {
    $products = $this->repo->findAll();
    $this->assertTrue($products instanceof Illuminate\Database\Eloquent\Collection);
  }
 
  public function testValidatePasses()
  {
    $reply = $this->repo->validate(array(
      'title'    => 'This Should Pass',
      'content'   => 'Lorem ipsum Fugiat consectetur laborum Ut consequat aliqua.',
      'author_name' => 'Testy McTesterson'
    ));
 
    $this->assertTrue($reply);
  }
 
  public function testValidateFailsWithoutTitle()
  {
    try {
      $reply = $this->repo->validate(array(
        'content'   => 'Lorem ipsum Fugiat consectetur laborum Ut consequat aliqua.',
        'author_name' => 'Testy McTesterson'
      ));
    }
    catch(ValidationException $expected)
    {
      return;
    }
 
    $this->fail('ValidationException was not raised');
  }
 
  public function testValidateFailsWithoutAuthorName()
  {
    try {
      $reply = $this->repo->validate(array(
        'title'    => 'This Should Pass',
        'content'   => 'Lorem ipsum Fugiat consectetur laborum Ut consequat aliqua.'
      ));
    }
    catch(ValidationException $expected)
    {
      return;
    }
 
    $this->fail('ValidationException was not raised');
  }
 
  public function testStoreReturnsModel()
  {
    $product_data = array(
      'title'    => 'This Should Pass',
      'content'   => 'Lorem ipsum Fugiat consectetur laborum Ut consequat aliqua.',
      'author_name' => 'Testy McTesterson'
    );
 
    $product = $this->repo->store($product_data);
 
    $this->assertTrue($product instanceof Illuminate\Database\Eloquent\Model);
    $this->assertTrue($product->title === $product_data['title']);
    $this->assertTrue($product->content === $product_data['content']);
    $this->assertTrue($product->author_name === $product_data['author_name']);
  }
 
  public function testUpdateSaves()
  {
    $product_data = array(
      'title' => 'The Title Has Been Updated'
    );
 
    $product = $this->repo->update(1, $product_data);
 
    $this->assertTrue($product instanceof Illuminate\Database\Eloquent\Model);
    $this->assertTrue($product->title === $product_data['title']);
  }
 
  public function testDestroySaves()
  {
    $reply = $this->repo->destroy(1);
    $this->assertTrue($reply);
 
    try {
      $this->repo->findById(1);
    }
    catch(NotFoundException $expected)
    {
      return;
    }
 
    $this->fail('NotFoundException was not raised');
  }
 
  public function testInstanceReturnsModel()
  {
    $product = $this->repo->instance();
    $this->assertTrue($product instanceof Illuminate\Database\Eloquent\Model);
  }
 
  public function testInstanceReturnsModelWithData()
  {
    $product_data = array(
      'title' => 'Un-validated title'
    );
 
    $product = $this->repo->instance($product_data);
    $this->assertTrue($product instanceof Illuminate\Database\Eloquent\Model);
    $this->assertTrue($product->title === $product_data['title']);
  }
 
}