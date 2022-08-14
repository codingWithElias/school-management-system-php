<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['fname'])      &&
    isset($_POST['lname'])      &&
    isset($_POST['username'])   &&
    isset($_POST['teacher_id']) &&
    isset($_POST['subjects'])   &&
    isset($_POST['grades'])) {
    
    include '../../DB_connection.php';
    include "../data/teacher.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];

    $teacher_id = $_POST['teacher_id'];
    
    $grades = "";
    foreach ($_POST['grades'] as $grade) {
    	$grades .=$grade;
    }

    $subjects = "";
    foreach ($_POST['subjects'] as $subject) {
    	$subjects .=$subject;
    }

    $data = 'teacher_id='.$teacher_id;

    if (empty($fname)) {
		$em  = "First name is required";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($lname)) {
		$em  = "Last name is required";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn, $teacher_id)) {
		$em  = "Username is taken! try another";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else {
        $sql = "UPDATE teachers SET
                username = ?, fname=?, lname=?, subjects=?, grades=?
                WHERE teacher_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$fname, $lname, $subjects, $grades, $teacher_id]);
        $sm = "successfully updated!";
        header("Location: ../teacher-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../teacher-edit.php?error=$em");
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
