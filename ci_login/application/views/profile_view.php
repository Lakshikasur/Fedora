<!DOCTYPE html>
<html lang="en">
<head>
  <title> The Band</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      	<?php 
      		if( $this->session->userdata("login") ) { ?>
      			<li>Hello <?php echo $this->session->userdata("uname")?> </li>
      			<li><a href="<?php echo base_url(); ?>index.php/login/logout">Logout</a></li>
      	<?php 	} else { ?>
      			<li><a href="<?php echo base_url(); ?>index.php/login/index">Login</a></li>
      			<li><a href="<?php echo base_url(); ?>index.php/login/signup">Sign Up</a></li>
      	<?php 	} ?>
      	
      
      </ul>
    </div>
  </div>
</nav>
<!-- Container (Contact Section) -->
<div id="contact" class="container">
 
   <h3 class="text-center">Contact</h3>
  <div class="row">
  	 <h2>Hi! <?php echo $email?> </h2>
  	   
   </div>
   
  </div>
<!-- Footer -->
<footer class="text-center">
</footer>
</body>
</html>
