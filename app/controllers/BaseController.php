<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
		
	public function __construct()
	{
	    //Assets
	    HTML::add('jquery', 'js/jQuery.js');
	    HTML::add('bootstrap-js', 'js/bootstrap.min.js');
	    HTML::add('custom-js', 'js/custom.js');


	    HTML::add('bootstrap-css', 'css/bootstrap.min.css');
	    HTML::add('custom-css', 'css/custom.css');
	    HTML::__construct();
	}


	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}