<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";


       $fname = '';
       $lname = '';
       $uname = '';
       $address = '';
       $en = '';
       $pn = '';
       $qf = '';
       $email = '';

       if (isset($_GET['fname'])) $fname = $_GET['fname'];
       if (isset($_GET['lname'])) $lname = $_GET['lname'];
       if (isset($_GET['uname'])) $uname = $_GET['uname'];
       if (isset($_GET['address'])) $address = $_GET['address'];
       if (isset($_GET['en'])) $en = $_GET['en'];
       if (isset($_GET['pn'])) $pn = $_GET['pn'];
       if (isset($_GET['qf'])) $qf = $_GET['qf'];
       if (isset($_GET['email'])) $email = $_GET['email'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Add Registrar Office</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
     ?>
     <div class="container mt-5">
        <a href="registrar-office.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/registrar-office-add.php">
        <h3>Add New Registrar Office User</h3><hr>
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
          <label class="form-label">First name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$fname?>" 
                 name="fname">
        </div>
        <div class="mb-3">
          <label class="form-label">Last name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$lname?>"
                 name="lname">
        </div>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$uname?>"
                 name="username">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <div class="input-group mb-3">
              <input type="text" 
                     class="form-control"
                     name="pass"
                     id="passInput">
              <button class="btn btn-secondary"
                      id="gBtn">
                      Random</button>
          </div>
          
        </div>
        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$address?>"
                 name="address">
        </div>
        <div class="mb-3">
          <label class="form-label">employee Number</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$en?>"
                 name="employee_number">
        </div>
        <div class="mb-3">
          <label class="form-label">Phone Number</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$pn?>"
                 name="phone_number">
        </div>
        <div class="mb-3">
          <label class="form-label">Qualification</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$qf?>"
                 name="qualification">
        </div>
        <div class="mb-3">
          <label class="form-label">Email Address</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$email?>"
                 name="email_address">
        </div>
        <div class="mb-3">
          <label class="form-label">Gender</label><br>
          <input type="radio"
                 value="Male"
                 checked 
                 name="gender"> Male
                 &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio"
                 value="Female"
                 name="gender"> Female
        </div>
        <div class="mb-3">
          <label class="form-label">Date of Birth</label>
          <input type="date" 
                 class="form-control"
                 value=""
                 name="date_of_birth">
        </div>
      <button type="submit" class="btn btn-primary">Add</button>
     </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(7) a").addClass('active');
        });

        function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

           }
           var passInput = document.getElementById('passInput');
           passInput.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
        });
    </script>

</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>