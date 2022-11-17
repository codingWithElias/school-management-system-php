<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['section']) &&
    isset($_POST['grade']) &&
    isset($_POST['class_id'])) {
    
    include '../../DB_connection.php';

    $section = $_POST['section'];
    $grade = $_POST['grade'];
    $class_id = $_POST['class_id'];

    $data = 'class_id='.$class_id;

    if (empty($class_id)) {
        $em  = "Class id is required";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
    }else if (empty($grade)) {
        $em  = "Grade is required";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
    }else if (empty($section)) {
        $em  = "Section is required";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
    }else {
        // check if the class already exists
        $sql_check = "SELECT * FROM class 
                      WHERE grade=? AND section=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$grade, $section]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "The class already exists";
           header("Location: ../class-edit.php?error=$em&$data");
           exit;
        }else {

            $sql  = "UPDATE class SET grade=?, section=?
                     WHERE class_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$grade, $section, $class_id]);
            $sm = "Class updated successfully";
            header("Location: ../class-edit.php?success=$sm&$data");
            exit;
       }
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../class.php?error=$em");
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
