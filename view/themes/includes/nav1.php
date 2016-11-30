 <nav class="navbar navbar-default navbar-fixed-top" id="nav-body">
   <div class="container-fluid">
     <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
       <a class="navbar-brand" href="/">Sample MVC Website</a>
     </div>
     <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
	          <li class="active"><a href="./">Home</a></li>
	          <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="./pages/about-us">About Us
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="#">Page 1-1</a></li>
				  <li><a href="#">Page 1-2</a></li>
				  <li><a href="#">Page 1-3</a></li>
				</ul>
              </li>
	          <li><a href="/pages/calendar">Calendar</a></li>
	          <li><a href="/pages/contact-us">Contact</a></li>
	   </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="/pages/sign-up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
         <li><a href="/pages/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
       </ul>
     </div>
   </div>
</nav>