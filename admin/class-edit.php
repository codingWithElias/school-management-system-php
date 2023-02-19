<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['class_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/class.php";
       include "data/grade.php";
       include "data/section.php";

       $class = getClassById($_GET['class_id'], $conn);
       $grades = getAllGrades($conn);
       $sections = getAllSections($conn);
       

       if ($class == 0) {
         header("Location: class.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Edit Class</title>
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
        <a href="class.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/class-edit.php">
        <h3>Edit Class</h3><hr>
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
          <label class="form-label">Grade</label>
          <select name="grade"
                  class="form-control" >
                  <?php foreach ($grades as $grade) { 
                     $selected = 0;
                     if ($grade['grade_id'] == $class['grade'] ) {
                       $selected = 1;
                     }
                  ?>

                    <option  value="<?=$grade['grade_id']?>"
                          <?php if ($selected) echo "selected"; ?> >
                       <?=$grade['grade_code'].'-'.$grade['grade']?>
                    </option> 
                  <?php } ?>
                  
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Section</label>
          <select name="section"
                  class="form-control" >
                  <?php foreach ($sections as $section) {
                    $selected = 0;
                    if ($section['section_id'] == $class['section'] ) {
                       $selected = 1;
                     }
                   ?>
                    <option value="<?=$section['section_id']?>" <?php if ($selected) echo "selected"; ?> >
                       <?=$section['section']?>
                    </option> 
                  <?php } ?> 
          </select>
        </div>
        <input type="text" 
                 class="form-control"
                 value="<?=$class['class_id']?>"
                 name="class_id"
                 hidden>

      <button type="submit" 
              class="btn btn-primary">
              Update</button>
     </form>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(6) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

  }else {
    header("Location: class.php");
    exit;
  } 
}else {
	header("Location: class.php");
	exit;
} 

?>