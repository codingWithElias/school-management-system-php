<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['grade']) &&
    isset($_POST['section'])) {
    
    include '../../DB_connection.php';

    $section = $_POST['section'];
    $grade = $_POST['grade'];

  if (empty($section)) {
		$em  = "Section is required";
		header("Location: ../class-add.php?error=$em");
		exit;
	}else if (empty($grade)) {
		$em  = "Grade is required";
		header("Location: ../class-add.php?error=$em");
		exit;
	}else {
        // check if the class already exists
        $sql_check = "SELECT * FROM class 
                      WHERE grade=? AND section=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$grade, $section]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "The class already exists";
           header("Location: ../class-add.php?error=$em");
           exit;
        }else {
          $sql  = "INSERT INTO
                 class(grade, section)
                 VALUES(?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$grade, $section]);
          $sm = "New class created successfully";
          header("Location: ../class-add.php?success=$sm");
          exit;
        } 
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../class-add.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
