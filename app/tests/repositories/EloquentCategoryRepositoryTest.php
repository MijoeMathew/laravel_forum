<?php
 
class EloquentCategoryRepositoryTest extends TestCase {
 
  public function setUp()
  {
    parent::setUp();
    $this->repo = App::make('EloquentCategoryRepository');
  }
 
  public function testFindByIdReturnsModel()
  {
    $category = $this->repo->findById(1);
    $this->assertTrue($category instanceof Illuminate\Database\Eloquent\Model);
  }
 
  public function testFindAllReturnsCollection()
  {
    $categories = $this->repo->findAll();
    $this->assertTrue($categories instanceof Illuminate\Database\Eloquent\Collection);
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
    $category_data = array(
      'title'    => 'This Should Pass',
      'content'   => 'Lorem ipsum Fugiat consectetur laborum Ut consequat aliqua.',
      'author_name' => 'Testy McTesterson'
    );
 
    $category = $this->repo->store($category_data);
 
    $this->assertTrue($category instanceof Illuminate\Database\Eloquent\Model);
    $this->assertTrue($category->title === $category_data['title']);
    $this->assertTrue($category->content === $category_data['content']);
    $this->assertTrue($category->author_name === $category_data['author_name']);
  }
 
  public function testUpdateSaves()
  {
    $category_data = array(
      'title' => 'The Title Has Been Updated'
    );
 
    $category = $this->repo->update(1, $category_data);
 
    $this->assertTrue($category instanceof Illuminate\Database\Eloquent\Model);
    $this->assertTrue($category->title === $category_data['title']);
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
    $category = $this->repo->instance();
    $this->assertTrue($category instanceof Illuminate\Database\Eloquent\Model);
  }
 
  public function testInstanceReturnsModelWithData()
  {
    $category_data = array(
      'title' => 'Un-validated title'
    );
 
    $category = $this->repo->instance($category_data);
    $this->assertTrue($category instanceof Illuminate\Database\Eloquent\Model);
    $this->assertTrue($category->title === $category_data['title']);
  }
 
}