<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/setting.php";
       $setting = getSetting($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Setting</title>
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
        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/setting-edit.php">
        <h3>Edit</h3><hr>
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
          <label class="form-label">School Name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['school_name']?>" 
                 name="school_name">
        </div>
        <div class="mb-3">
          <label class="form-label">Slogan</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['slogan']?>" 
                 name="slogan">
        </div>
        <div class="mb-3">
                <label class="form-label">About</label>
                <textarea class="form-control" name="about"
                          rows="4"><?=$setting['about']?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Current Year</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['current_year']?>" 
                 name="current_year">
        </div>
        <div class="mb-3">
          <label class="form-label">Current Semester</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['current_semester']?>"
                 name="current_semester">
        </div>
      <button type="submit" 
              class="btn btn-primary">
              Update</button>
     </form>
 </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(10) a").addClass('active');
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