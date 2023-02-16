<?php  

// Get Teacher by ID
function getTeacherById($teacher_id, $conn){
   $sql = "SELECT * FROM teachers
           WHERE teacher_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$teacher_id]);

   if ($stmt->rowCount() == 1) {
     $teacher = $stmt->fetch();
     return $teacher;
   }else {
    return 0;
   }
}


