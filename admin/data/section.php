<?php  

// All Sections
function getAllSections($conn){
   $sql = "SELECT * FROM section";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $sections = $stmt->fetchAll();
     return $sections;
   }else {
    return 0;
   }
}

// Get Section by ID
function getSectioById($grade_id, $conn){
   $sql = "SELECT * FROM section
           WHERE section_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$grade_id]);

   if ($stmt->rowCount() == 1) {
     $grade = $stmt->fetch();
     return $grade;
   }else {
    return 0;
   }
}

// DELETE
function removeSection($id, $conn){
   $sql  = "DELETE FROM section
           WHERE section_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}