<?php
 
class CategoriesControllerTest extends TestCase {
 
  /**
   * Test Basic Route Responses
   */
  public function testIndex()
  {
    $response = $this->call('GET', route('v1.categories.index'));
    $this->assertTrue($response->isOk());
  }
 
  public function testShow()
  {
    $response = $this->call('GET', route('v1.categories.show', array(1)));
    $this->assertTrue($response->isOk());
  }
 
  public function testCreate()
  {
    $response = $this->call('GET', route('v1.categories.create'));
    $this->assertTrue($response->isOk());
  }
 
  public function testEdit()
  {
    $response = $this->call('GET', route('v1.categories.edit', array(1)));
    $this->assertTrue($response->isOk());
  }
 
  /**
   * Test that controller calls repo as we expect
   */
  public function testIndexShouldCallFindAllMethod()
  {
    $mock = Mockery::mock('CategoryRepositoryInterface');
    $mock->shouldReceive('findAll')->once()->andReturn('foo');
    App::instance('CategoryRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.categories.index'));
    $this->assertTrue(!! $response->original);
  }
 
  public function testShowShouldCallFindById()
  {
    $mock = Mockery::mock('CategoryRepositoryInterface');
    $mock->shouldReceive('findById')->once()->andReturn('foo');
    App::instance('CategoryRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.categories.show', array(1)));
    $this->assertTrue(!! $response->original);
  }
 
  public function testCreateShouldCallInstanceMethod()
  {
    $mock = Mockery::mock('CategoryRepositoryInterface');
    $mock->shouldReceive('instance')->once()->andReturn(array());
    App::instance('CategoryRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.categories.create'));
    $this->assertViewHas('post');
  }
 
  public function testEditShouldCallFindByIdMethod()
  {
    $mock = Mockery::mock('CategoryRepositoryInterface');
    $mock->shouldReceive('findById')->once()->andReturn(array());
    App::instance('CategoryRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.categories.edit', array(1)));
    $this->assertViewHas('post');
  }
 
  public function testStoreShouldCallStoreMethod()
  {
    $mock = Mockery::mock('CategoryRepositoryInterface');
    $mock->shouldReceive('store')->once()->andReturn('foo');
    App::instance('CategoryRepositoryInterface', $mock);
 
    $response = $this->call('POST', route('v1.categories.store'));
    $this->assertTrue(!! $response->original);
  }
 
  public function testUpdateShouldCallUpdateMethod()
  {
    $mock = Mockery::mock('CategoryRepositoryInterface');
    $mock->shouldReceive('update')->once()->andReturn('foo');
    App::instance('CategoryRepositoryInterface', $mock);
 
    $response = $this->call('PUT', route('v1.categories.update', array(1)));
    $this->assertTrue(!! $response->original);
  }
 
  public function testDestroyShouldCallDestroyMethod()
  {
    $mock = Mockery::mock('CategoryRepositoryInterface');
    $mock->shouldReceive('destroy')->once()->andReturn(true);
    App::instance('CategoryRepositoryInterface', $mock);
 
    $response = $this->call('DELETE', route('v1.categories.destroy', array(1)));
    $this->assertTrue( empty($response->original) );
  }
 
}