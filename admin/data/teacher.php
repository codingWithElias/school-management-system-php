<?php  

// All Teachers 
function getAllTeachers($conn){
   $sql = "SELECT * FROM teachers";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $teachers = $stmt->fetchAll();
     return $teachers;
   }else {
   	return 0;
   }
}

// Check if the username Unique
function unameIsUnique($uname, $conn){
   $sql = "SELECT username FROM teachers
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);

   if ($stmt->rowCount() >= 1) {
     return 0;
   }else {
   	return 1;
   }
}