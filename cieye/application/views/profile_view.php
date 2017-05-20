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

  <div class="row">    
    <div class="col-md-4">
      <div class="row">
        <div class="col-sm-12 form-group">
          <?php 
            echo $full_name;
          ?>      
        </div>
         <div class="col-sm-12 form-group">
          <?php 
            echo $email;
          ?>      
        </div>
         <div class="col-sm-12 form-group">
          <?php 
            echo $id;
          ?>      
        </div>
        <a href="<?php echo base_url(); ?>index.php/login/edit_user/<?php echo $id; ?>">Edit11</a>          
    
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
