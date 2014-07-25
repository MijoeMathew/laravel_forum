<?php
 
class ProductsControllerTest extends TestCase {
 
  /**
   * Test Basic Route Responses
   */
  public function testIndex()
  {
    $response = $this->call('GET', route('v1.products.index'));
    $this->assertTrue($response->isOk());
  }
 
  public function testShow()
  {
    $response = $this->call('GET', route('v1.products.show', array(1)));
    $this->assertTrue($response->isOk());
  }
 
  public function testCreate()
  {
    $response = $this->call('GET', route('v1.products.create'));
    $this->assertTrue($response->isOk());
  }
 
  public function testEdit()
  {
    $response = $this->call('GET', route('v1.products.edit', array(1)));
    $this->assertTrue($response->isOk());
  }
 
  /**
   * Test that controller calls repo as we expect
   */
  public function testIndexShouldCallFindAllMethod()
  {
    $mock = Mockery::mock('ProductRepositoryInterface');
    $mock->shouldReceive('findAll')->once()->andReturn('foo');
    App::instance('ProductRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.products.index'));
    $this->assertTrue(!! $response->original);
  }
 
  public function testShowShouldCallFindById()
  {
    $mock = Mockery::mock('ProductRepositoryInterface');
    $mock->shouldReceive('findById')->once()->andReturn('foo');
    App::instance('ProductRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.products.show', array(1)));
    $this->assertTrue(!! $response->original);
  }
 
  public function testCreateShouldCallInstanceMethod()
  {
    $mock = Mockery::mock('ProductRepositoryInterface');
    $mock->shouldReceive('instance')->once()->andReturn(array());
    App::instance('ProductRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.products.create'));
    $this->assertViewHas('post');
  }
 
  public function testEditShouldCallFindByIdMethod()
  {
    $mock = Mockery::mock('ProductRepositoryInterface');
    $mock->shouldReceive('findById')->once()->andReturn(array());
    App::instance('ProductRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.products.edit', array(1)));
    $this->assertViewHas('post');
  }
 
  public function testStoreShouldCallStoreMethod()
  {
    $mock = Mockery::mock('ProductRepositoryInterface');
    $mock->shouldReceive('store')->once()->andReturn('foo');
    App::instance('ProductRepositoryInterface', $mock);
 
    $response = $this->call('POST', route('v1.products.store'));
    $this->assertTrue(!! $response->original);
  }
 
  public function testUpdateShouldCallUpdateMethod()
  {
    $mock = Mockery::mock('ProductRepositoryInterface');
    $mock->shouldReceive('update')->once()->andReturn('foo');
    App::instance('ProductRepositoryInterface', $mock);
 
    $response = $this->call('PUT', route('v1.products.update', array(1)));
    $this->assertTrue(!! $response->original);
  }
 
  public function testDestroyShouldCallDestroyMethod()
  {
    $mock = Mockery::mock('ProductRepositoryInterface');
    $mock->shouldReceive('destroy')->once()->andReturn(true);
    App::instance('ProductRepositoryInterface', $mock);
 
    $response = $this->call('DELETE', route('v1.products.destroy', array(1)));
    $this->assertTrue( empty($response->original) );
  }
 
}