<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Login Form</title>
	<link rel="stylesheet" href="<?php echo base_url("/assets/css/bootstrap.css"); ?>">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">		
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('login')){ ?>
				<li><p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></li>
				<li><a href="<?php echo base_url(); ?>index.php/login/logout">Log Out</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/login/signup">Signup</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<br/>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h4>Profile Summary</h4>
			<hr/>
			<p>Name: <?php echo $user_name; ?></p>
			<p>Email: <?php echo $email; ?></p>	
		</div>
	</div>
	

</div>




      <?php echo $error;?> 
      <?php echo form_open_multipart('login/do_upload');?> 
		
      <form action = "" method = "">
         <input type = "file" name = "userfile" size = "20" /> 
         <br /><br /> 
         <input type = "submit" value = "upload" /> 
      </form> 
		


<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>
