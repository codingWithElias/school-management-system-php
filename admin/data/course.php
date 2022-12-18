<?php  

// All courses
function getAllCourses($conn){
   $sql = "SELECT * FROM courses";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $courses = $stmt->fetchAll();
     return $courses;
   }else {
    return 0;
   }
}

// Get course by ID
function getCourseById($course_id, $conn){
   $sql = "SELECT * FROM courses
           WHERE course_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$course_id]);

   if ($stmt->rowCount() == 1) {
     $course = $stmt->fetch();
     return $course;
   }else {
    return 0;
   }
}

// DELETE course
function removeCourse($id, $conn){
   $sql  = "DELETE FROM courses
           WHERE course_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}