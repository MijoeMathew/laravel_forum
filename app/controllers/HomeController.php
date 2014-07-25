<?php

class HomeController extends BaseController {


	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| Sets the default layout 
	| 
	*/
	protected $layout = 'layouts.master';

	/**
	 * Used to get the home page 
	*/
	public function index()
	{
		return View::make('home.index');
	}



}