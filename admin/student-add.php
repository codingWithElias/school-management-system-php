<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/grade.php";
       include "data/section.php";
       $grades = getAllGrades($conn);
       $sections = getAllSections($conn);


       $fname = '';
       $lname = '';
       $uname = '';
       $address = '';
       $email = '';
       $pfn = '';
       $pln = '';
       $ppn = '';


       if (isset($_GET['fname'])) $fname = $_GET['fname'];
       if (isset($_GET['lname'])) $lname = $_GET['lname'];
       if (isset($_GET['uname'])) $uname = $_GET['uname'];
       if (isset($_GET['address'])) $address = $_GET['address'];
       if (isset($_GET['email'])) $email = $_GET['email'];
       if (isset($_GET['pfn'])) $pfn = $_GET['pfn'];
       if (isset($_GET['pln'])) $pln = $_GET['pln'];
       if (isset($_GET['ppn'])) $ppn = $_GET['ppn'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Add Student</title>
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
        <a href="student.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/student-add.php">
        <h3>Add New Student</h3><hr>
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
          <label class="form-label">Address</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$address?>"
                 name="address">
        </div>
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$email?>"
                 name="email_address">
        </div>
        <div class="mb-3">
          <label class="form-label">Date of birth</label>
          <input type="date" 
                 class="form-control"
                 name="date_of_birth">
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
        </div><br><hr>
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
          
        </div><br><hr>
        <div class="mb-3">
          <label class="form-label">Parent first name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$pfn?>"
                 name="parent_fname">
        </div>
        <div class="mb-3">
          <label class="form-label">Parent last name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$pln?>"
                 name="parent_lname">
        </div>
        <div class="mb-3">
          <label class="form-label">Parent phone number</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$ppn?>"
                 name="parent_phone_number">
        </div><br><hr>
        <div class="mb-3">
          <label class="form-label">Grade</label>
          <div class="row row-cols-5">
            <?php foreach ($grades as $grade): ?>
            <div class="col">
              <input type="radio"
                     name="grade"
                     value="<?=$grade['grade_id']?>">
                     <?=$grade['grade_code']?>-<?=$grade['grade']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Section</label>
          <div class="row row-cols-5">
            <?php foreach ($sections as $section): ?>
            <div class="col">
              <input type="radio"
                     name="section"
                     value="<?=$section['section_id']?>">
                     <?=$section['section']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>

      <button type="submit" class="btn btn-primary">Register</button>
     </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
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