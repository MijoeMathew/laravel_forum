<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Shopping Cart - Admin Section</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="Shopping cart admin section">
 
 <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
 
 <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
 <!--[if lt IE 9]>
 <script src="{{ asset('js/html5shiv.js') }}"></script>
 <![endif]-->
</head>
<body>
 
 <div id="notifications">
 </div>
 
 <div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
   <div class="container">
    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
    <div class="nav-collapse collapse">
     <ul class="nav">
	  <li class="active">{{ link_to('/','Home') }}</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li>{{ link_to('categories','List Categories') }}</li>
			<li>{{ link_to('addcategory','Add Category') }}</li>
			
		</ul>
		</li>
	  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li>{{ link_to('/products','List Products') }}</li>
			<li>{{ link_to('/addproduct','Add Product') }}</li>
			
		</ul>
		</li>
          <li>{{ link_to('login', 'Login') }}</li>
     </ul>
    </div><!--/.nav-collapse -->
   </div>
  </div>
 </div>
 
 <div class="container" data-role="main">
 
  {{ $content }}
 
 </div> <!-- /container -->
 
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- use Google CDN for jQuery to hopefully get a cached copy -->
 <script src="{{ asset('node_modules/underscore/underscore-min.js') }}"></script>
 <script src="{{ asset('node_modules/backbone/backbone-min.js') }}"></script>
 <script src="{{ asset('node_modules/mustache/mustache.js') }}"></script>
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('js/app.js') }}"></script>
<script>
    var fullUrl = '{{ asset('') }}';
    window.siteUrl = fullUrl.replace(window.location.origin, '');
   </script>
  <script src="{{ asset('js/app.js') }}"></script>
 @yield('scripts')
</body>
</html>