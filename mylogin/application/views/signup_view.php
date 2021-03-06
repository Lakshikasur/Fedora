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
				<li><a href="<?php echo base_url(); ?>index.php/home/logout">Log Out</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/signup">Signup</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<br/>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">

		<?php 
			$attributes = array("name" =>"signupform");
			echo form_open('login/signup', $attributes);
		?>
		<legend>Signup </legend>
		<?php echo $this->session->flashdata('msg'); ?>
		

		<div class="form-group">
			<label for="name">First Name</label>
			<input class="form-control" name="fname" placeholder="First Name" type="text" value="<?php echo set_value('fname'); ?>" />
			<span class="text-danger"><?php echo form_error('fname'); ?></span>
		</div>

		<div class="form-group">
			<label for="lname">Last Name</label>
			<input class="form-control" name="lname" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" />
			<span class="text-danger"><?php echo form_error('lname'); ?></span>
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" id="txtemail" name="email" placeholder="Email" type="text" value="<?php echo set_value('email'); ?>" />
			<span id="spemail" class="text-danger"><?php echo form_error('email'); ?></span>
		</div>


		<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" name="password" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>" />
			<span class="text-danger"><?php echo form_error('password'); ?></span>
		</div>

		<div class="form-group">
			<label for="cpassword">Confirm Password</label>
			<input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" value="<?php echo set_value('cpassword'); ?>" />
			<span class="text-danger"><?php echo form_error('cpassword'); ?></span>
		</div>

		<div class="form-group">
			<button name="submit" type="submit" class="btn btn-info">Sign up</button>
			<button name="cancel" type="reset" class="btn btn-info">Cancel</button>
		</div>

		<?php echo form_close(); ?>				
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Login ? <a href="<?php echo base_url(); ?>index.php/login">Login</a>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

<script type="text/javascript">
  $(document).ready(function() {	   
	    $("#txtemail").focusout(function(){
	        var email = $(this).val();
	        $.ajax({
			    url: '<?=base_url()?>index.php/login/emailcheck',  
			    type: 'post',
			    data: 'email='+email,
			    success:function(data) {
			    	if( data["fname"] != undefined ) {
			    		$("#spemail").html("Email alredy exist!");
			    	}
			   		
			    }
			  }); 

	    });
});


/*


 $('#txtemail').on('focusout', function() {
alert("1111");



   

  alert(item);

  var page_id="<?=$page=basename($_SERVER['PHP_SELF']); ?>";
  $.ajax({
    url: '<?=base_url()?>record_edit',
    type: 'post',
    data: 'id='+valu+'&page_id='+page_id,
    success:function(data)
    {
      //alert(data);
    }
  }); 

 
 });*/
 </script>



</body>
</html>
