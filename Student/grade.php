<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student - Grade Summary</title>
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
     <div class="d-flex justify-content-center align-items-center flex-column pt-4">
         <h6>Year 2023 - Semester I </h6>
         <div class="table-responsive">
              <table class="table table-bordered mt-1 mb-5 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Title</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Results</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">1</th>
                    <td>Ph01</th>
                    <td>Physics</th>
                    <th>B+</th>
                    <td><small class="border p-1">10/10</small>&nbsp; <small class="border p-1">20/20</small>&nbsp; <small class="border p-1">15/30</small>&nbsp; <small class="border p-1">40/40</small></th>
                    <th>85</th>
                  </tr>
                  <tr>
                    <td scope="row">2</th>
                    <td>Ph01</th>
                    <td>Physics</th>
                    <th>B+</th>
                    <td><small class="border p-1">10/10</small>&nbsp; <small class="border p-1">20/20</small>&nbsp; <small class="border p-1">15/30</small>&nbsp; <small class="border p-1">40/40</small></th>
                    <th>85</th>
                  </tr>
                  <tr>
                    <td scope="row">3</th>
                    <td>Ph01</th>
                    <td>Physics</th>
                    <th>B+</th>
                    <td><small class="border p-1">10/10</small>&nbsp; <small class="border p-1">20/20</small>&nbsp; <small class="border p-1">15/30</small>&nbsp; <small class="border p-1">40/40</small></th>
                    <th>85</th>
                  </tr>
                </tbody>
              </table>
           </div><br />

           <h6>Year 2023 - Semester I </h6>
           <div class="table-responsive">
              <table class="table table-bordered mt-1 mb-5 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Title</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Results</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">1</th>
                    <td>Ph01</th>
                    <td>Physics</th>
                    <th>B+</th>
                    <td><small class="border p-1">10/10</small>&nbsp; <small class="border p-1">20/20</small>&nbsp; <small class="border p-1">15/30</small>&nbsp; <small class="border p-1">40/40</small></th>
                    <th>85</th>
                  </tr>
                  <tr>
                    <td scope="row">2</th>
                    <td>Ph01</th>
                    <td>Physics</th>
                    <th>B+</th>
                    <td><small class="border p-1">10/10</small>&nbsp; <small class="border p-1">20/20</small>&nbsp; <small class="border p-1">15/30</small>&nbsp; <small class="border p-1">40/40</small></th>
                    <th>85</th>
                  </tr>
                  <tr>
                    <td scope="row">3</th>
                    <td>Ph01</th>
                    <td>Physics</th>
                    <th>B+</th>
                    <td><small class="border p-1">10/10</small>&nbsp; <small class="border p-1">20/20</small>&nbsp; <small class="border p-1">15/30</small>&nbsp; <small class="border p-1">40/40</small></th>
                    <th>85</th>
                  </tr>
                </tbody>
              </table>
           </div>
     </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
   <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
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