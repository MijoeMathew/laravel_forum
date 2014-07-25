<?php
 /*
App::bind('PostRepositoryInterface', 'EloquentPostRepository');
App::bind('CommentRepositoryInterface', 'EloquentCommentRepository');

App::bind('CategoryRepositoryInterface', 'EloquentCategoryRepository');
App::bind('ProductRepositoryInterface', 'EloquentProductRepository');

//create a group of routes that will belong to APIv1
Route::group(array('prefix' => 'v1'), function()
{
  Route::resource('posts', 'V1\PostsController');
  Route::resource('posts.comments', 'V1\PostsCommentsController');

  Route::resource('categories', 'V1\CategoriesController');
  Route::resource('products', 'V1\ProductsController');
});*/
/**
 * Method #1: use catch-all
 * optionally commented out while we use Method 2
 */
// change your existing app route to this:
// we are basically just giving it an optional parameter of "anything"
// Route::get('/{path?}', function($path = null)
// {
//   return View::make('layouts.application')->nest('content', 'app');
// })
// ->where('path', '.*'); //regex to match anything (dots, slashes, letters, numbers, etc)
/**
 * Method #2: define each route
 */





/*
Route::get('/', function()
{
  $posts = App::make('PostRepositoryInterface')->paginate();
  return View::make('layouts.application')->nest('content', 'posts.index', array(
    'posts' => $posts
  ));
});
 
Route::get('posts/{id}', function($id)
{
  $post = App::make('PostRepositoryInterface')->findById($id);
  return View::make('layouts.application')->nest('content', 'posts.show', array(
    'post' => $post
  ));
});

Route::get('categories', function()
{
  $categories = App::make('CategoryRepositoryInterface')->paginate();
  return View::make('layouts.application')->nest('content', 'categories.index', array(
    'categories' => $categories
  ));
});

Route::get('categories/{id}', function($id)
{
  $category = App::make('CategoryRepositoryInterface')->findById($id);
  return View::make('layouts.application')->nest('content', 'categories.show', array(
    'category' => $category
  ));
});

Route::get('products', function()
{
  $products = App::make('ProductRepositoryInterface')->paginate();
  return View::make('layouts.application')->nest('content', 'products.index', array(
    'products' => $products
  ));
});

Route::resource('posts', 'PostsController');*/

Route::get('/', function()
{
    return View::make('home.index');
});



//Route::controller(Controller::detect());
Route::get('about','HomeController@showWelcome');