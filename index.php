<?php 
include "DB_connection.php";
include "data/setting.php";
$setting = getSetting($conn);

if ($setting != 0) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to <?=$setting['school_name']?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo.png">
</head>
<body class="body-home">
    <div class="black-fill"><br /> <br />
    	<div class="container">
    	<nav class="navbar navbar-expand-lg bg-light"
    	     id="homeNav">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">
		    	<img src="logo.png" width="40">
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#about">About</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#contact">Contact</a>
		        </li>
		      </ul>
		      <ul class="navbar-nav me-right mb-2 mb-lg-0">
		      	<li class="nav-item">
		          <a class="nav-link" href="login.php">Login</a>
		        </li>
		      </ul>
		  </div>
		    </div>
		</nav>
        <section class="welcome-text d-flex justify-content-center align-items-center flex-column">
        	<img src="logo.png" >
        	<h4>Welcome to <?=$setting['school_name']?></h4>
        	<p><?=$setting['slogan']?></p>
        </section>
        <section id="about"
                 class="d-flex justify-content-center align-items-center flex-column">
        	<div class="card mb-3 card-1">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="logo.png" class="img-fluid rounded-start" >
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">About Us</h5>
			        <p class="card-text"><?=$setting['about']?></p>
			        <p class="card-text"><small class="text-muted">Y School</small></p>
			      </div>
			    </div>
			  </div>
			</div>
        </section>
        <section id="contact"
                 class="d-flex justify-content-center align-items-center flex-column">
        	<form method="post"
    	          action="req/contact.php">
        		<h3>Contact Us</h3>
        		<?php if (isset($_GET['error'])) { ?>
	    		<div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
				</div>
				<?php } ?>
				<?php if (isset($_GET['success'])) { ?>
		          <div class="alert alert-success" role="alert">
		           <?=$_GET['success']?>
		          </div>
		        <?php } ?>
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
			    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Full Name</label>
			    <input type="text" name="full_name" class="form-control">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Message</label>
			    <textarea class="form-control"name="message" rows="4"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Send</button>
			</form>
        </section>
        <div class="text-center text-light">
        	Copyright &copy; <?=$setting['current_year']?> <?=$setting['school_name']?>. All rights reserved.
        </div>

    	</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>
<?php }else {
	header("Location: login.php");
	exit;
}  ?>