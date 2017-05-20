<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme The Band</title>
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
        <?php if ($this->session->userdata('login')){ ?>
        <li><p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></li>
        <li><a href="<?php echo base_url(); ?>index.php/home/logout">Log Out</a></li>
        <?php } else { ?>
        <li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/login/signup">Signup</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>We love our fans!</em></p>

  <?php 
    $attributes = array("name" => "signupform");
    echo form_open("login/signup",  $attributes );
  ?>

  <div class="row">    
    <div class="col-md-4">
      <div class="row">
        <div class="col-sm-12 form-group">
          <label for="EMAIL">Email</label>
          <input class="form-control" id="EMAIL" name="EMAIL" value="<?php echo set_value('EMAIL'); ?>" placeholder="Email" type="text" >
          <span class="text-danger"><?php echo form_error("EMAIL")?></span>
        </div>
        <div class="col-sm-12 form-group">
          <label for="FIRST_NAME">First Name</label>
          <input class="form-control" id="FIRST_NAME" name="FIRST_NAME" value="<?php echo set_value('FIRST_NAME'); ?>" placeholder="Fisrt Name" type="text" >
          <span class="text-danger"><?php echo form_error("FIRST_NAME")?></span>
        </div>
        <div class="col-sm-12 form-group">
          <label for="LAST_NAME">Last Name</label>
          <input class="form-control" id="LAST_NAME" name="LAST_NAME" value="<?php echo set_value('LAST_NAME'); ?>" placeholder="Last Name" type="text">
          <span class="text-danger"><?php echo form_error("LAST_NAME")?></span>
        </div>
        <div class="col-sm-12 form-group">
          <label for="PASSWORD">Password</label>
          <input class="form-control" id="PASSWORD" name="PASSWORD" value="<?php echo set_value('PASSWORD'); ?>" placeholder="Password" type="password">
          <span class="text-danger"><?php echo form_error("PASSWORD")?></span>
        </div>
         <div class="col-sm-12 form-group">
          <label for="CPASSWORD">Confirm Password</label>
          <input class="form-control" id="CPASSWORD" name="CPASSWORD" value="<?php echo set_value('CPASSWORD'); ?>" placeholder="Confirm Password" type="password">
          <span class="text-danger"><?php echo form_error("CPASSWORD")?></span>
        </div>     
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
<?php echo $this->session->flashdata('msg'); ?>

<!-- Footer -->
<footer class="text-center">
</footer>

</body>
</html>
