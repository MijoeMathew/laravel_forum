<!Doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Forum</title>
		 {{ HTML::styles() }}
	</head>
	<body>
		

<!-- Site header and navigation -->
	    <header class="top" role="header">
	        <div class="container">
	            <a href="#" class="navbar-brand pull-left">
	                Forum
	            </a>
	            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="glyphicon glyphicon-align-justify"></span>
	            </button>
	            <nav class="navbar-collapse collapse" role="navigation">
	                <ul class="navbar-nav nav pull-right">
	                	@section("navigation")
	                    <li><a href="#">Home</a></li>
	                    @yield_section

	                </ul>
	            </nav>
	        </div>
	    </header>


		<!-- Site banner -->
	    <div class="banner">
	        <div class="container">
	            <h1>Ask your questions!! Share your ideas!!</h1>
	            <p>A comprehensive forum to describe your thoughts and views.</p>

	            <a class="btn btn-default">Ask a question</a>
	            <a class="btn btn-default pull-right">Share your knowledge</a>
	        </div>
	    </div>


<!-- Middle content section -->
	    <div class="middle">
	    	@yield("content")	
	    </div>

<!-- Site footer -->
	    <div class="bottom">
	        <div class="container">
	            <div class="col-md-4">
	                <h3><span class="glyphicon glyphicon-heart"></span> Footer section 1</h3>
	                <p>Content for the first footer section.</p>
	            </div>
	            <div class="col-md-4">
	                <h3><span class="glyphicon glyphicon-star"></span> Footer section 2</h3>
	                <p>Content for the second footer section.</p>
	            </div>
	            <div class="col-md-4">
	                <h3><span class="glyphicon glyphicon-music"></span> Footer section 3</h3>
	                <p>Content for the third footer section.</p>
	            </div>
	        </div>
	    </div>

	    <div class="login_area">

			<ul class="nav nav-tabs" role="tablist">
			   <li class="active"><a href="#home" role="tab" data-toggle="tab">Login</a></li>
			   <li><a href="#profile" role="tab" data-toggle="tab">Signup</a></li>  
			</ul>

			<div class="tab-content">
			  <div class="tab-pane active" id="home">
				<form class="form-inline well" method="post">
				  <input type="text" placeholder="Email" class="input-large">
				  <input type="password" placeholder="Password" class="input-large">
				  <button class="btn btn-primary" type="submit">Log in</button>
				</form>
			  </div>
			  <div class="tab-pane" id="profile">
				<form class="form-inline well" method="post">
				  <input type="text" placeholder="Name" class="input-large">
				  <input type="text" placeholder="Email" class="input-large">
				  <input type="password" placeholder="Password" class="input-large">
				  <button class="btn btn-primary" type="submit">Sign in</button>
				</form>
			  </div>
			  <a class="btn pull-right login btn-default">Close</a>
			</div>
		</div>

		{{ HTML::scripts() }}
	</body>

</html>

